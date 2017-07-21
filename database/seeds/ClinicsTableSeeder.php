<?php

use Illuminate\Database\Seeder;

class ClinicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinics')->insert([[
            'name' => 'ALLERGY & ASTHMA CLINIC',
            'image' => 'QQfZN6BxKJ7obsN1483706251.png',
            'description' => 'Allergic complaints occur due to various immunological reasons. It has to be corrected from the very beginning. Running nose (rhinitis) is the common symptoms. Can get severe if untreated, to the form of bronchial asthma, especially if treated with suppressive modalities. Allergic rhinitis and asthma has complete cure on a time bound treatment depending upon the duration, genetic predisposition etc., with regular follow ups.',
        ],

        [
            'name' => 'MIGRAINE & HEADACHES CLINIC',
            'image' => 'dpSAKqvjLWGzNsp1483706785.png',
            'description' => 'Migraine is a neurological syndrome characterized by altered bodily perceptions, severe headache and nausea. It is more common to women. Homoeopathy is a system of medicine with which migraine can be rooted out from the diseased. Long term medication may be needed depending upon the chronicity. At AIHMS quality resources of medicine and doctors are being used to combat treatment.',
        ],
        [
            'name' => 'SKIN & COSMETIC CLINIC',
            'image' => 'default.png',
            'description' => 'Skin problems are the most annoying of all. The irritation, disfigurement and pain are frustrating at times. Eczema, dermatitis, allergic rashes, melanoma and cosmetic issues like acne, molluscum on face, discoloration etc. find excellent treatment in homeopathy. Skin problems have to be carefully dealt with as suppressive modes can end up in deeper organ damages like asthma. Homoeopathy aims at a radical level treatment and cure.',
        ],
        [
            'name' => 'CANCER CLINIC',
            'image' => 'default.png',
            'description' => 'A dreaded pathological condition where diseased cells multiply rapidly & destroy the healthy ones. Radical cure is impossible many a times.Palliative clinics and enhancing life expectancy are the main treatment modalities .Homoeopathic medicines promotes cell mediated immunity so as to retard disease progression. AIHMS has an eminent faculty and quality medicines in cancer treatment.',
        ],
		[
            'name' => 'OBESITY CLINIC',
            'image' => 'default.png',
            'description' => 'Has emerged as a global health problempredisposing individuals to various deleterious health issues. It increases the risk of developing DM, heart diseases, dyspnea and arthritis. Correct medication and a well-modulated life style works effectively. To be on a safer side, homoeopathy can surely help out such patients, with a combined therapeutic modality of medicines + life style management.',
        ],

		[
            'name' => 'CHOLESTEROL CLINIC',
            'image' => 'default.png',
            'description' => 'A hazard of this century, where patients run panic stricken. Sedentary life habits, fast foods, lack of exercise adds to it. Homoeopathy offers a good control over blood cholesterol levels with safe medications. Well experienced team of physicians renders their service at AIHMS, in the cardiology clinic.',
        ],

		[
            'name' => 'GERIATRIC CLINIC',
            'image' => 'default.png',
            'description' => 'Allergic complaints occur due to various immunological reasons. It has to be corrected from the very beginning. Running nose (rhinitis) is the common symptoms. Can get severe if untreated, to the form of bronchial asthma, especially if treated with suppressive modalities. Allergic rhinitis and asthma has complete cure on a time bound treatment depending upon the duration, genetic predisposition etc., with regular follow ups.',
        ],

		[
            'name' => 'CANCER CLINIC',
            'image' => 'default.png',
            'description' => 'Allergic complaints occur due to various immunological reasons. It has to be corrected from the very beginning. Running nose (rhinitis) is the common symptoms. Can get severe if untreated, to the form of bronchial asthma, especially if treated with suppressive modalities. Allergic rhinitis and asthma has complete cure on a time bound treatment depending upon the duration, genetic predisposition etc., with regular follow ups.',
        ],

        ]);
    }
}
