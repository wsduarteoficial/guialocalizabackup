<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Utils;

use SEOMeta;
use OpenGraph;
use URL;

trait SeoMetaDataUtils {


    private function metaData($title, $description )
    {
        SEOMeta::setTitle( $title );
        OpenGraph::setTitle( $title );

        SEOMeta::setDescription( $description );
        OpenGraph::setDescription( $description );

        SEOMeta::addMeta('author', 'GuiaLocaliza', 'name');
        SEOMeta::addMeta('distribution', 'global', 'name');
        SEOMeta::addMeta('copyright', '(c) '. date('Y') .' GuiaLocaliza', 'name');

        SEOMeta::setCanonical( URL::current() );
        OpenGraph::setUrl( URL::current() );

        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'pt-br');

        OpenGraph::addImage(asset('/storage/uploads/logos-app/logo-shared.png'));
    }
}
