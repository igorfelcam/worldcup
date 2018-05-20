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
            'nickname'  => 'EGI',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/lYah1Uqw37XdicC6C4HNqg_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Rússia',
            'nickname'  => 'RUS',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/5Y6kOqiOIv2C1sP9C_BWtA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Arábia Saudita',
            'nickname'  => 'ARA',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/QoAJxO46fHid3_T-7nRZ0Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Uruguai',
            'nickname'  => 'URU',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/KnSUdQWiGRoy89q4x85IgA_48x48.png'
        ]);

        // Grupo B
        DB::table( 'teams' )->insert([
            'name'      => 'Irã',
            'nickname'  => 'IRA',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/1oq8Fy7ETpBpZNaCA22ArQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Marrocos',
            'nickname'  => 'MAR',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/I3gt2Ew39ux3GGdZ-4JE3g_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Portugual',
            'nickname'  => 'POR',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/HJ3_2c4w791nZJj7n-Lj3Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Espanha',
            'nickname'  => 'ESP',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/5hLkf7KFHhmpaiOJQv8LmA_48x48.png'
        ]);

        // Grupo C
        DB::table( 'teams' )->insert([
            'name'      => 'Austrália',
            'nickname'  => 'AUS',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/jSgw5z0EPOLzdUi-Aomq7Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Dinamarca',
            'nickname'  => 'DIN',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/LaOvu-pyRqRso6uzff55XA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'França',
            'nickname'  => 'FRA',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/z3JEQB3coEAGLCJBEUzQ2A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Peru',
            'nickname'  => 'PER',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/U08wYdQptUaWuweG82L3dw_48x48.png'
        ]);

        // Grupo D
        DB::table( 'teams' )->insert([
            'name'      => 'Argentina',
            'nickname'  => 'ARG',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/1xBWyjjkA6vEWopPK3lIPA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Croácia',
            'nickname'  => 'CRO',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/9toerdOg8xW4CRhDaZxsyw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Islândia',
            'nickname'  => 'ISL',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/QSlAlD9v6Fm_drC_2z1u8A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Nigéria',
            'nickname'  => 'NIG',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/2vpR8clrEZdpNjaiHKpg7A_48x48.png'
        ]);

        // Grupo E
        DB::table( 'teams' )->insert([
            'name'      => 'Brasil',
            'nickname'  => 'BRA',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/zKLzoJVYz0bb6oAnPUdwWQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Costa Rica',
            'nickname'  => 'COS',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/ixZiM5pj2IvvYc15k-zfeQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Sérvia',
            'nickname'  => 'SER',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/xyh1vmZ-xJH2iJCKjqS1Ow_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Suiça',
            'nickname'  => 'SUI',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/1hy9ek4dOIffYULM6k1fqg_48x48.png'
        ]);

        // Grupo F
        DB::table( 'teams' )->insert([
            'name'      => 'Alemanha',
            'nickname'  => 'ALE',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/h1FhPLmDg9AHXzhygqvVPg_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Coreia do Sul',
            'nickname'  => 'COR',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/Uu5pwNmMHGd5bCooKrS3Lw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'México',
            'nickname'  => 'MEX',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/yJF9xqmUGenD8108FJbg9A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Suécia',
            'nickname'  => 'SUE',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/OkFlRvRsKMWb8Hk20L9Trw_48x48.png'
        ]);

        // Grupo G
        DB::table( 'teams' )->insert([
            'name'      => 'Bélgica',
            'nickname'  => 'BEL',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/6SF7yEoB60bU5knw-M7R5Q_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Inglaterra',
            'nickname'  => 'ING',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/DTqIL8Ba3KIuxGkpXw5ayA_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Panamá',
            'nickname'  => 'PAN',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/JIn8OwxL6KFFiYrKGnL2RQ_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Tunísia',
            'nickname'  => 'TUN',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/Xs33c9XVUJBX0IkeFn_bIw_48x48.png'
        ]);

        // Grupo H
        DB::table( 'teams' )->insert([
            'name'      => 'Colômbia',
            'nickname'  => 'COL',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/tXHnA_tDylayacdjWQCJvw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Japão',
            'nickname'  => 'JAP',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/by4OltvtZz7taxuQtkiP3A_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Polônia',
            'nickname'  => 'POL',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/yTS_Piy3M1wUBnqU0n5aAw_48x48.png'
        ]);
        DB::table( 'teams' )->insert([
            'name'      => 'Senegal',
            'nickname'  => 'SEN',
            'url_flag'  => 'https://ssl.gstatic.com/onebox/media/sports/logos/zw3ac5sIbH4DS6zP5auOkQ_48x48.png'
        ]);
    }
}
