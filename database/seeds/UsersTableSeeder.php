<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //stadiony
        DB::table('stadiony')->insert([

            'nazwa'=>'Old Trafford',
            'adres'=>'Sir Matt Busby Way, Stretford, Manchester M16 0RA, Wielka Brytania',
            'liczbamiejsc'=>74994,
        ]);
        DB::table('stadiony')->insert([

            'nazwa'=>'Allianz Stadium',
            'adres'=>'Corso Gaetano Scirea, 50, 10151 Torino TO, Włochy',
            'liczbamiejsc'=>41507,
        ]);
        DB::table('stadiony')->insert([

            'nazwa'=>'Allianz Arena',
            'adres'=>'Werner-Heisenberg-Allee 25, 80939 München, Niemcya',
            'liczbamiejsc'=>75000,
        ]);
        DB::table('stadiony')->insert([

            'nazwa'=>'Camp Nou',
            'adres'=>'C. dAristides Maillol, 12, 08028 Barcelona, Hiszpania',
            'liczbamiejsc'=>99354,
        ]);
        //koniec stadionów

        //dtużyny
        DB::table('druzyny')->insert([
            'nazwa'=>'Manchester United',
            'kraj'=>'Anglia',

        ]);
        DB::table('druzyny')->insert([
            'nazwa'=>'Juventus Turyn',
            'kraj'=>'Włochy',

        ]);
        DB::table('druzyny')->insert([
            'nazwa'=>'FC Barcelona',
            'kraj'=>'Hiszpania',

        ]);
        DB::table('druzyny')->insert([
            'nazwa'=>'Bayern Monachium',
            'kraj'=>'Niemcy',

        ]);
        //organizatorzy
        DB::table('users')->insert([
                'name'=>'Marian',
                'lastname'=>'Paździoch',
                'email'=>'m.pazdzioch@mail.com',
                'password'=>bcrypt('haslo10'),
                'login'=>'mpazdzioch',
                'telefon'=>'789789789',
                'status'=>'Aktywny',
            'funkcja'=>'Organizator',


            ]);
        DB::table('users')->insert([
            'name'=>'Kuba',
            'lastname'=>'Kowalski',
            'email'=>'k.kowalski@mail.com',
            'password'=>bcrypt('haslo10'),
            'login'=>'kkowalski',
            'telefon'=>'456456456',
            'status'=>'Aktywny',
            'funkcja'=>'Organizator',


        ]);
        DB::table('users')->insert([
            'name'=>'Jan',
            'lastname'=>'Nowak',
            'email'=>'j.nowak@mail.com',
            'password'=>bcrypt('haslo10'),
            'login'=>'jnowak',
            'telefon'=>'123123123',
            'status'=>'Aktywny',
            'funkcja'=>'Organizator',


        ]);
        //koniec organizatorow


        //ligi

        DB::table('ligi')->insert([

           'nazwa'=>'Premier League',
           'Kraj'=>'Anglia',
        ]);
        DB::table('ligi')->insert([

            'nazwa'=>'Serie A',
            'Kraj'=>'Włochy',
        ]);
        DB::table('ligi')->insert([

            'nazwa'=>'Bundesliga',
            'Kraj'=>'Niemcy',
        ]);
        DB::table('ligi')->insert([

            'nazwa'=>'Primera Division',
            'Kraj'=>'Hiszpania',
        ]);
        // koniec ligi



    }
}
