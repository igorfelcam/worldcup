<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Grupo A
        DB::table( 'teams' )->insert([
            'name'      => 'Egito',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/lYah1Uqw37XdicC6C4HNqg_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Rússia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/5Y6kOqiOIv2C1sP9C_BWtA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Arábia Saudita',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/QoAJxO46fHid3_T-7nRZ0Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Uruguai',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/KnSUdQWiGRoy89q4x85IgA_48x48.png'
        ]);

        // Grupo B
        DB::table( 'teams' )->insert([
            'name'      => 'Irã',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/1oq8Fy7ETpBpZNaCA22ArQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Marrocos',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/I3gt2Ew39ux3GGdZ-4JE3g_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Portugual',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/HJ3_2c4w791nZJj7n-Lj3Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Espanha',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/5hLkf7KFHhmpaiOJQv8LmA_48x48.png'
        ]);

        // Grupo C
        DB::table( 'teams' )->insert([
            'name'      => 'Austrália',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/jSgw5z0EPOLzdUi-Aomq7Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Dinamarca',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/LaOvu-pyRqRso6uzff55XA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'França',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/z3JEQB3coEAGLCJBEUzQ2A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Peru',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/U08wYdQptUaWuweG82L3dw_48x48.png'
        ]);

        // Grupo D
        DB::table( 'teams' )->insert([
            'name'      => 'Argentina',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/1xBWyjjkA6vEWopPK3lIPA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Croácia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/9toerdOg8xW4CRhDaZxsyw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Islândia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/QSlAlD9v6Fm_drC_2z1u8A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Nigéria',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/2vpR8clrEZdpNjaiHKpg7A_48x48.png'
        ]);

        // Grupo E
        DB::table( 'teams' )->insert([
            'name'      => 'Brasil',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/zKLzoJVYz0bb6oAnPUdwWQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Costa Rica',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/ixZiM5pj2IvvYc15k-zfeQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Sérvia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/xyh1vmZ-xJH2iJCKjqS1Ow_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Suiça',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/1hy9ek4dOIffYULM6k1fqg_48x48.png'
        ]);

        // Grupo F
        DB::table( 'teams' )->insert([
            'name'      => 'Alemanha',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/h1FhPLmDg9AHXzhygqvVPg_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Coreia do Sul',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/Uu5pwNmMHGd5bCooKrS3Lw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'México',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/yJF9xqmUGenD8108FJbg9A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Suécia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/OkFlRvRsKMWb8Hk20L9Trw_48x48.png'
        ]);

        // Grupo G
        DB::table( 'teams' )->insert([
            'name'      => 'Bélgica',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/6SF7yEoB60bU5knw-M7R5Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Inglaterra',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/DTqIL8Ba3KIuxGkpXw5ayA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Panamá',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/JIn8OwxL6KFFiYrKGnL2RQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Tunísia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/Xs33c9XVUJBX0IkeFn_bIw_48x48.png'
        ]);

        // Grupo H
        DB::table( 'teams' )->insert([
            'name'      => 'Colômbia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/tXHnA_tDylayacdjWQCJvw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Japão',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/by4OltvtZz7taxuQtkiP3A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Polônia',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/yTS_Piy3M1wUBnqU0n5aAw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Senegal',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/zw3ac5sIbH4DS6zP5auOkQ_48x48.png'
        ]);
    }
}
