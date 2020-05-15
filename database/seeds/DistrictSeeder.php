<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $districts = [
            "achham",
            "arghakhanchi",
            "baglung",
            "baitadi",
            "bajhang",
            "bajura",
            "banke",
            "bara",
            "bardiya",
            "bhaktapur",
            "bhojpur",
            "chitwan",
            "dadeldhura",
            "dailekh",
            "dang deukhuri",
            "darchula",
            "dhading",
            "dhankuta",
            "dhanusa",
            "dholkha",
            "dolpa",
            "doti",
            "gorkha",
            "gulmi",
            "humla",
            "ilam",
            "jajarkot",
            "jhapa",
            "jumla",
            "kailali",
            "kalikot",
            "kanchanpur",
            "kapilvastu",
            "kaski",
            "kathmandu",
            "kavrepalanchok",
            "khotang",
            "lalitpur",
            "lamjung",
            "mahottari",
            "makwanpur",
            "manang",
            "morang",
            "mugu",
            "mustang",
            "myagdi",
            "nawalparasi",
            "nuwakot",
            "okhaldhunga",
            "palpa",
            "panchthar",
            "parbat",
            "parsa",
            "pyuthan",
            "ramechhap",
            "rasuwa",
            "rautahat",
            "rolpa",
            "rukum",
            "rupandehi",
            "salyan",
            "sankhuwasabha",
            "saptari",
            "sarlahi",
            "sindhuli",
            "sindhupalchok",
            "siraha",
            "solukhumbu",
            "sunsari",
            "surkhet",
            "syangja",
            "tanahu",
            "taplejung",
            "terhathum",
            "udayapur"
        ];

        $data = [];
        foreach ($districts as $district) {

            $data[] = [
                'name' => ucfirst($district),
                'slug' => \Illuminate\Support\Str::slug($district)
            ];
        }

        \App\Repos\District::insert($data);
    }
}
