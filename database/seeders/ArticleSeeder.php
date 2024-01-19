<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorId = DB::table('users')->where('role', 'jurnalist')->value('id');

        $articles = [
            [
                'category' => 'artistic',
                'title' => 'Explorarea Artistică',
                'content' => 'În lumea artei, fiecare pânză și penel devin portale către lumi nespuse și emoții profunde. Artiștii transformă viziuni abstracte în opere de artă care vorbesc fără cuvinte, fiecare culoare și linie având propria poveste. Expozițiile de artă deschid ferestre către culturi și epoci diferite, îmbogățindu-ne percepția asupra frumuseții. Arta nu este doar un act de creație, ci și un dialog continuu între creator și spectator, un dialog care traversează timpul și spațiul.'
            ],
            [
                'category' => 'tehnic',
                'title' => 'Inovații Tehnice',
                'content' => 'Tehnologia modernă ne-a propulsat într-o eră a inovației și eficienței neprecedente. Fiecare nouă descoperire tehnologică schimbă modul în care trăim, lucrăm și interacționăm cu cei din jur. De la inteligența artificială la energiile regenerabile, tehnica ne deschide noi orizonturi și ne provoacă să gândim diferit. Este fascinant cum progresul tehnologic ne-a unit mai mult ca oricând, în ciuda distanțelor fizice care ne separă.'
            ],
            [
                'category' => 'stiinta',
                'title' => 'Descoperiri Științifice',
                'content' => 'Știința este motorul progresului uman, o călătorie continuă de explorare și descoperire. Cercetătorii caută neobosit răspunsuri la întrebările fundamentale ale existenței, fiecare experiment deschizând noi căi de cunoaștere. De la genele care definesc viața la galaxiile îndepărtate ce punctează cosmosul, știința ne-a extins înțelegerea realității. Este uimitor cum, prin știință, ceea ce ieri părea imposibil, astăzi devine realitate.'
            ],
            [
                'category' => 'moda',
                'title' => 'Tendințe în Modă',
                'content' => 'Moda este un limbaj universal, un mijloc prin care ne exprimăm identitatea și stilul personal. Designerii de modă inovează continuu, creând colecții care reflectă tendințe culturale, sociale și estetice. De pe podiumurile de modă până în magazine, fiecare articol vestimentar spune o poveste, un dialog între tradiție și modernitate. Moda nu este doar despre îmbrăcăminte; este despre arta de a trăi, un simbol al frumuseții și expresivității individuale.'
            ]
        ];

        foreach ($articles as $article) {
            DB::table('articles')->insert([
                'title' => $article['title'],
                'author_id' => $authorId,
                'content' => $article['content'],
                'category' => $article['category'],
                'status' => 'in asteptare',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
