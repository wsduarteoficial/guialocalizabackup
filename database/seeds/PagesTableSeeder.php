<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\Page\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * @var Page
     */
    private $page;

    /**
     * PagesTableSeeder constructor.
     * @param page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $total = $this->page->count();
        $pages = $this->pages();

        if($total === count($pages)) {
            return;
        }

        if($total <= 0) {

            foreach ($pages as $page) {

                $this->page->create([
                    'title' => $page['title'],
                    'slug'  => $page['slug'],
                    'body'  => $page['body'],
                    'default' => true,
                    'active' => true
                ]);

            }

            return;

        }

        foreach ($pages as $page) {

            $total = $this->page->where('title', $page['title'])->count();
            if ($total <= 0) {

                $this->page->create([
                    'title' => $page['title'],
                    'slug'  => $page['slug'],
                    'body'  => $page['body'],
                    'default' => true,
                    'active' => true
                ]);

            }

        }

    }

    public function pages()
    {

		return [

            ['title' => 'Quem Somos', 'slug' => 'quem-somos', 'body' => 'Quem Somos'],
            ['title' => 'Politica de Privacidade', 'slug' => 'politica-de-privacidade', 'body' => 'Politica de Privacidade'],
            ['title' => 'Termos de Uso', 'slug' => 'termos-de-uso', 'body' => 'Termos de Uso'],

        ];

    }

}
