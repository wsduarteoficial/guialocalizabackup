<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LogoService
{

    private function logo(Request $request)
    {

        if (is_null( $request->file('logo') ) )
            return;

        // Get filename with extension
        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('logo')->getClientOriginalExtension();

        if(!empty($filename) && $extension == 'png') {

            // Create new filename
            $filenameToStore = 'logo.'. $extension;

            // Uploads image
            $request->file( 'logo'  )->storeAs( 'public/uploads/logos-app', $filenameToStore );

            Image::make( storage_path( sprintf('app/public/uploads/logos-app/%s', $filenameToStore ) ) )->resize(180, 40,function ($constraint) {
                $constraint->aspectRatio();
            })->save();

        }

    }

    private function logoShared(Request $request)
    {

         if (is_null( $request->file('logo_shared') ))
            return;
        // Get filename with extension
        $filenameWithExt = $request->file('logo_shared')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('logo_shared')->getClientOriginalExtension();

        if(!empty($filename) && $extension == 'png') {

            // Create new filename
            $filenameToStore = 'logo-shared.'. $extension;

            // Uploads image
            $request->file( 'logo_shared'  )->storeAs( 'public/uploads/logos-app', $filenameToStore );

            Image::make( storage_path( sprintf('app/public/uploads/logos-app/%s', $filenameToStore ) ) )->resize(200, 200,function ($constraint) {
                $constraint->aspectRatio();
            })->save();

        }

    }

    public function uploads(Request $request)
    {

        $this->logo($request);
        $this->logoShared($request);

        return redirect()->route('admin.settings.logos')->with('status', 'Logotipo(s) enviados com sucesso!');

    }

}
