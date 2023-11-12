<?php

return  [
    'TITLE' => 'Government Staff Housing System',
    'TITLE_SHORT' => 'GSHS',
    'LOGO_URL' => 'assets/images/logo.svg',
    'NAV_LINKS' => ['Home','Guide','Services','Status'],
    'FORM_NAME' => 'အိမ်ခန်းလျှောက်လွှာ',
    'CTA_TEXT' => 'Download Form',
    'CTA_TEXT_2' => 'Get Started',
    'QUOTE' => 'Here\'s your guide.',
    'DESCRIPTION' => 'We aim to digitally solve the necessity of providing guidance on staff-housing requests.',
    'GUIDE'=> [
        [
            'title'=> 'First Step',
            'sub-title'=> 'is to Download an Application Form',
            'desc'=> 'The first step is to "Download an Application Form." This step offers applicants the opportunity to access the official housing application form, a vital document required to initiate the application process. Click the following download button to doenlad the form. This form is for submitting physically.',
            'cta'=> 'Download Form'
        ],
        [
            'title'=> 'Second Step',
            'sub-title'=> 'is to Enter Essential Informations',
            'desc'=> 'During this step, applicants are prompted to provide fundamental details required for their housing application. This typically includes personal information, employment history, family size, and other key criteria necessary for evaluating their eligibility for government housing.',
            'cta'=> 'Fill Essential Information'
        ],
    ],
    'FEATURES_TITLE' => 'Streamlined Application Process',
    'FEATURES_DESC' => 'Making the housing application process more streamlined and efficient while improving transparency and communication!',
    'FEATURES' => [
        [
            'title'=> 'Guided Application Process',
            'desc'=> 'Provide step-by-step guidance to applicants, making the housing application process more straightforward and user-friendly.'
        ],
        [
            'title'=> 'Scoring System',
            'desc'=> 'A robust scoring system allows administrators to assess and rank applicants based on specific criteria, ensuring transparent and data-driven housing allocation.'
        ],
        [
            'title'=> 'Application Status Tracking',
            'desc'=> 'Applicants can conveniently track the progress of their housing application through the system, providing transparency and reducing the need for direct inquiries.'
        ]
    ],
    'FORM' => [
        'title'=> 'Personal Information',
        'desc'=> 'Please enter your information after you have physically submtted the form.',
        'fields' => [
            'Full name',
            'NRC',
            'Age',
            'Experience',
            // 'လက်ရှိ ရာထူး',
            'Current rank',
            'Together living family count',
            'Together living elders and kids count',
            'Accomodation situation',
            'Physically form submitted date',
            'Moved to state date',
            'Your partner\'s also a staff here',
            'Special situation'
        ],
        'placeholders'=>[
            'full_name'=>'Mg Mg',
            'nrc'=>'0/KAKAKA(N)123456',
            'age'=>'25',
            'experience'=>'5',
            'family_count'=>'5',
            'elders_and_kids_count'=>'2',
        ],
        'DEFAULT_SELECT'=>'Please Choose',
    ],
    
    'FOOTER' =>[
        'prompt'=>'Check Your Status',
        'prompt_found'=>'Hello ',
        'prompt_not_found'=> 'Sorry, We can\'t find your NRC. Make sure you have submitted the form digitally!',
        'sub_prompt'=> 'Check the status of your application with your NRC!',
        'sub_prompt_found_valid'=> 'Congratulations, your informations are been varified! Wait for the administrators to contact you personally!',
        'sub_prompt_found_pending'=> 'Unfortunately, your informations are still been varifying! It\'s is important to make sure the provided informations are correct!',
        'submit'=> 'Check Now',
    ],
    
    // RULE_OPTIONS
    'RANKS' => ['r1','r2','r3','r4','r5','r6'],
    'ACCOMODATION_SITUATIONS' => ['A1','A2','A3','A4'],
];