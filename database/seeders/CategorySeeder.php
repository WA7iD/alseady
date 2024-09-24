<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'title_ar' => 'أمراض القلب',
                'title_en' => 'Cardiology',
                'description_ar' => 'أمراض القلب هو التخصص الطبي الذي يركز على دراسة وتشخيص وعلاج الأمراض التي تصيب القلب والأوعية الدموية. يشمل هذا التخصص مجموعة واسعة من الحالات مثل أمراض الشرايين التاجية، قصور القلب، اضطرابات النبض، وارتفاع ضغط الدم. أطباء القلب يستخدمون تقنيات متعددة مثل القسطرة القلبية، تخطيط القلب الكهربائي، والتصوير بالموجات فوق الصوتية لتشخيص ومعالجة هذه الحالات.',
                'description_en' => 'Cardiology is the medical specialty focused on the study, diagnosis, and treatment of diseases related to the heart and blood vessels. This specialty covers a wide range of conditions including coronary artery disease, heart failure, arrhythmias, and hypertension. Cardiologists use various techniques such as cardiac catheterization, electrocardiograms, and echocardiography to diagnose and manage these conditions.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'الجراحة العامة',
                'title_en' => 'General Surgery',
                'description_ar' => 'الجراحة العامة هي فرع من فروع الطب الذي يتعامل مع مجموعة واسعة من العمليات الجراحية على الأعضاء الداخلية مثل الجهاز الهضمي، الغدد، والأنسجة الرخوة. الجراحون العامون يعالجون حالات مثل التهابات الزائدة الدودية، الفتق، والأورام. يتطلب هذا التخصص مهارات واسعة في مجموعة متنوعة من التقنيات الجراحية بما في ذلك الجراحة التقليدية والجراحة بالمنظار.',
                'description_en' => 'General Surgery is a branch of medicine that deals with a wide range of surgical procedures on internal organs such as the digestive system, glands, and soft tissues. General surgeons treat conditions like appendicitis, hernias, and tumors. This specialty requires broad skills in various surgical techniques, including traditional surgery and minimally invasive laparoscopic procedures.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الأطفال',
                'title_en' => 'Pediatrics',
                'description_ar' => 'طب الأطفال هو التخصص الطبي الذي يركز على الرعاية الصحية للأطفال من الولادة وحتى سن البلوغ. يتعامل أطباء الأطفال مع مجموعة متنوعة من الحالات الصحية بما في ذلك الأمراض الحادة والمزمنة، التطعيمات، وتطور النمو. كما يقدمون الرعاية الوقائية للأطفال ويعملون على تعزيز صحة الطفل من خلال الفحوصات الدورية والنصائح الغذائية.',
                'description_en' => 'Pediatrics is the medical specialty that focuses on the healthcare of children from birth to adolescence. Pediatricians manage a wide range of health conditions including acute and chronic illnesses, vaccinations, and growth and developmental issues. They also provide preventive care and work to promote the overall health and well-being of children through regular check-ups and nutritional guidance.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'الجلدية',
                'title_en' => 'Dermatology',
                'description_ar' => 'الجلدية هي التخصص الطبي الذي يهتم بتشخيص وعلاج الأمراض التي تؤثر على الجلد والشعر والأظافر. يغطي هذا التخصص مجموعة واسعة من الحالات بما في ذلك حب الشباب، الأكزيما، الصدفية، وسرطان الجلد. أطباء الجلدية يستخدمون تقنيات مثل الجراحة الجلدية، العلاج بالليزر، والعلاج الضوئي لإدارة هذه الحالات وتحسين صحة الجلد.',
                'description_en' => 'Dermatology is the medical specialty concerned with the diagnosis and treatment of diseases affecting the skin, hair, and nails. This specialty covers a wide range of conditions including acne, eczema, psoriasis, and skin cancer. Dermatologists use techniques such as dermatologic surgery, laser therapy, and phototherapy to manage these conditions and improve skin health.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'الطب النفسي',
                'title_en' => 'Psychiatry',
                'description_ar' => 'الطب النفسي هو التخصص الطبي الذي يركز على تشخيص وعلاج الاضطرابات النفسية والعقلية. يعمل الأطباء النفسيون على فهم وعلاج حالات مثل الاكتئاب، اضطرابات القلق، الاضطرابات الثنائية القطب، والفصام. يستخدمون مجموعة من العلاجات بما في ذلك الأدوية النفسية والعلاج السلوكي المعرفي والعلاج الجماعي لمساعدة المرضى على تحقيق صحة نفسية أفضل.',
                'description_en' => 'Psychiatry is the medical specialty focused on the diagnosis and treatment of mental and emotional disorders. Psychiatrists work to understand and treat conditions such as depression, anxiety disorders, bipolar disorder, and schizophrenia. They employ a range of therapies including psychopharmacology, cognitive-behavioral therapy, and group therapy to help patients achieve better mental health.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب العيون',
                'title_en' => 'Ophthalmology',
                'description_ar' => 'طب العيون هو التخصص الطبي الذي يهتم بصحة العين وتشخيص وعلاج الأمراض المتعلقة بالعين والبصر. أطباء العيون يعالجون حالات مثل المياه البيضاء، الجلوكوما، والتهابات العين. يستخدمون تقنيات متقدمة مثل جراحة الليزر، العدسات المزروعة، والفحص بالتصوير المقطعي لتحسين الرؤية والحفاظ على صحة العين.',
                'description_en' => 'Ophthalmology is the medical specialty dedicated to the health of the eye and the diagnosis and treatment of eye-related diseases and vision problems. Ophthalmologists treat conditions such as cataracts, glaucoma, and eye infections. They use advanced techniques like laser surgery, intraocular lenses, and optical coherence tomography to enhance vision and maintain eye health.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'الأشعة',
                'title_en' => 'Radiology',
                'description_ar' => 'الأشعة هي التخصص الطبي الذي يستخدم تقنيات التصوير مثل الأشعة السينية، التصوير بالرنين المغناطيسي، والتصوير المقطعي المحوسب لتشخيص الأمراض. يعمل أطباء الأشعة بشكل وثيق مع أطباء آخرين لتوفير معلومات دقيقة تساعد في تشخيص وعلاج مجموعة متنوعة من الحالات الطبية. تشمل الأشعة التشخيصية وكذلك التدخلية التي تتضمن إجراءات طبية تستخدم التوجيه بالصور لعلاج الأمراض.',
                'description_en' => 'Radiology is the medical specialty that utilizes imaging techniques such as X-rays, MRI, and CT scans to diagnose diseases. Radiologists work closely with other physicians to provide accurate information that aids in diagnosing and treating a wide range of medical conditions. Radiology includes both diagnostic imaging and interventional radiology, where image-guided procedures are used to treat conditions.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'أمراض النساء والتوليد',
                'title_en' => 'Obstetrics and Gynecology',
                'description_ar' => 'أمراض النساء والتوليد هو التخصص الطبي الذي يركز على صحة الجهاز التناسلي الأنثوي والرعاية الصحية للنساء خلال فترة الحمل والولادة. أطباء أمراض النساء يعالجون حالات مثل اضطرابات الدورة الشهرية، الأورام الليفية، وسرطان المبيض. كما يقدمون الرعاية الكاملة للحوامل ويعملون على ضمان سلامة الأم والجنين أثناء الحمل والولادة.',
                'description_en' => 'Obstetrics and Gynecology is the medical specialty that focuses on female reproductive health and the care of women during pregnancy and childbirth. Gynecologists treat conditions such as menstrual disorders, fibroids, and ovarian cancer. Obstetricians provide comprehensive care for pregnant women, ensuring the health and safety of both mother and baby during pregnancy and delivery.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الأنف والأذن والحنجرة',
                'title_en' => 'Otolaryngology (ENT)',
                'description_ar' => 'طب الأنف والأذن والحنجرة هو التخصص الطبي الذي يهتم بتشخيص وعلاج الأمراض التي تؤثر على الأذن والأنف والحنجرة والرأس والعنق. يشمل هذا التخصص حالات مثل التهاب الأذن الوسطى، اضطرابات السمع، مشاكل التنفس والشخير، وأمراض الحنجرة. أطباء الأنف والأذن والحنجرة يستخدمون تقنيات مثل تنظير الأنف والحنجرة والجراحة المجهرية لعلاج هذه الحالات وتحسين جودة حياة المرضى.',
                'description_en' => 'Otolaryngology, also known as ENT (Ear, Nose, and Throat), is the medical specialty focused on diagnosing and treating conditions affecting the ear, nose, throat, as well as the head and neck. This specialty covers issues like middle ear infections, hearing disorders, breathing and snoring problems, and throat diseases. ENT specialists use techniques such as nasal endoscopy, laryngoscopy, and microsurgery to treat these conditions and improve patient quality of life.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'جراحة العظام',
                'title_en' => 'Orthopedic Surgery',
                'description_ar' => 'جراحة العظام هي التخصص الطبي الذي يهتم بتشخيص وعلاج الإصابات والأمراض التي تؤثر على الجهاز العضلي الهيكلي. يشمل هذا التخصص علاج الكسور، الإصابات الرياضية، التهاب المفاصل، وأمراض العظام مثل هشاشة العظام. يستخدم الجراحون تقنيات متقدمة مثل الجراحة بالمنظار، تركيب المفاصل الصناعية، وإعادة بناء الأربطة لتحسين وظائف الحركة وتخفيف الألم.',
                'description_en' => 'Orthopedic Surgery is the medical specialty that focuses on diagnosing and treating injuries and diseases affecting the musculoskeletal system. This includes treating fractures, sports injuries, arthritis, and bone conditions like osteoporosis. Orthopedic surgeons use advanced techniques such as arthroscopy, joint replacement, and ligament reconstruction to improve mobility and relieve pain.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الأسنان',
                'title_en' => 'Dentistry',
                'description_ar' => 'طب الأسنان هو التخصص الطبي الذي يهتم بصحة الفم والأسنان وتشخيص وعلاج المشاكل المرتبطة بها. يشمل هذا التخصص العناية بالأسنان، الوقاية من تسوس الأسنان، علاج أمراض اللثة، وزراعة الأسنان. أطباء الأسنان يستخدمون تقنيات متقدمة مثل تقويم الأسنان، تبييض الأسنان، وعلاج الجذور للحفاظ على صحة الفم وتحسين الابتسامة.',
                'description_en' => 'Dentistry is the medical specialty that focuses on oral health, including the diagnosis and treatment of teeth and mouth-related issues. This specialty covers dental care, cavity prevention, gum disease treatment, and dental implants. Dentists use advanced techniques such as orthodontics, teeth whitening, and root canal therapy to maintain oral health and enhance smiles.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الأسرة',
                'title_en' => 'Family Medicine',
                'description_ar' => 'طب الأسرة هو التخصص الطبي الذي يوفر رعاية صحية شاملة للأفراد من جميع الأعمار في إطار العائلة. يشمل هذا التخصص الوقاية من الأمراض، التشخيص المبكر، وإدارة الحالات المزمنة مثل السكري وارتفاع ضغط الدم. أطباء الأسرة يقدمون الرعاية المستمرة ويعملون كحلقة وصل بين المريض والتخصصات الطبية الأخرى لضمان الحصول على الرعاية الشاملة.',
                'description_en' => 'Family Medicine is the medical specialty that provides comprehensive healthcare for individuals of all ages within the family context. This specialty includes disease prevention, early diagnosis, and management of chronic conditions like diabetes and hypertension. Family physicians offer continuous care and act as a bridge between the patient and other medical specialties to ensure holistic healthcare.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'الطب الباطني',
                'title_en' => 'Internal Medicine',
                'description_ar' => 'الطب الباطني هو التخصص الطبي الذي يهتم بتشخيص وعلاج الأمراض الداخلية لدى البالغين. يغطي هذا التخصص مجموعة واسعة من الحالات بما في ذلك أمراض القلب، الكلى، الجهاز الهضمي، والجهاز التنفسي. أطباء الباطنة يعملون على توفير الرعاية الوقائية والعلاجية من خلال فهم شامل للجسم البشري وإدارة الأمراض المعقدة.',
                'description_en' => 'Internal Medicine is the medical specialty that focuses on the diagnosis and treatment of internal diseases in adults. This specialty covers a wide range of conditions, including cardiovascular, renal, gastrointestinal, and respiratory diseases. Internists provide preventive and therapeutic care by offering a comprehensive understanding of the human body and managing complex medical conditions.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'الأمراض المعدية',
                'title_en' => 'Infectious Diseases',
                'description_ar' => 'الأمراض المعدية هو التخصص الطبي الذي يركز على تشخيص وعلاج الأمراض الناتجة عن العوامل الممرضة مثل البكتيريا والفيروسات والطفيليات والفطريات. أطباء الأمراض المعدية يعالجون حالات مثل السل، الملاريا، فيروس نقص المناعة البشرية، وأمراض الجهاز التنفسي المعدية. يشمل العلاج استخدام المضادات الحيوية واللقاحات وتقنيات العزل للحد من انتشار العدوى.',
                'description_en' => 'Infectious Diseases is the medical specialty focused on diagnosing and treating diseases caused by pathogens such as bacteria, viruses, parasites, and fungi. Infectious disease specialists treat conditions like tuberculosis, malaria, HIV, and respiratory infections. Treatment includes the use of antibiotics, vaccines, and isolation techniques to control the spread of infections.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الأعصاب',
                'title_en' => 'Neurology',
                'description_ar' => 'طب الأعصاب هو التخصص الطبي الذي يركز على تشخيص وعلاج اضطرابات الجهاز العصبي المركزي والمحيطي. يشمل هذا التخصص علاج حالات مثل الصرع، السكتة الدماغية، مرض باركنسون، والتصلب المتعدد. أطباء الأعصاب يستخدمون تقنيات مثل تخطيط كهربية الدماغ، التصوير بالرنين المغناطيسي، وفحوصات السائل النخاعي لتشخيص الحالات العصبية وتقديم العلاج المناسب.',
                'description_en' => 'Neurology is the medical specialty focused on diagnosing and treating disorders of the central and peripheral nervous systems. This includes treating conditions such as epilepsy, stroke, Parkinson\'s disease, and multiple sclerosis. Neurologists use techniques like electroencephalography, MRI scans, and cerebrospinal fluid analysis to diagnose neurological conditions and provide appropriate treatment.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'جراحة الأعصاب',
                'title_en' => 'Neurosurgery',
                'description_ar' => 'جراحة الأعصاب هي التخصص الطبي الذي يهتم بإجراء العمليات الجراحية على الجهاز العصبي المركزي والمحيطي لعلاج الأمراض والإصابات. يشمل هذا التخصص جراحة الدماغ، الحبل الشوكي، والأعصاب الطرفية. جراحو الأعصاب يستخدمون تقنيات متقدمة مثل الجراحة المجهرية، التنظير الداخلي، والجراحة بالليزر لعلاج الأورام، الأوعية الدموية الدماغية، وإصابات العمود الفقري.',
                'description_en' => 'Neurosurgery is the medical specialty that focuses on performing surgical procedures on the central and peripheral nervous systems to treat diseases and injuries. This specialty includes brain surgery, spinal cord surgery, and peripheral nerve surgery. Neurosurgeons use advanced techniques such as microsurgery, endoscopy, and laser surgery to treat tumors, brain vascular conditions, and spinal injuries.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الأورام',
                'title_en' => 'Oncology',
                'description_ar' => 'طب الأورام هو التخصص الطبي الذي يهتم بتشخيص وعلاج السرطان بأنواعه المختلفة. يشمل هذا التخصص علاج الأورام الصلبة مثل سرطان الثدي والرئة والبروستاتا، وكذلك الأورام الدموية مثل اللوكيميا والليمفوما. أطباء الأورام يستخدمون مجموعة من العلاجات مثل العلاج الكيميائي، العلاج الإشعاعي، والجراحة لإدارة مرض السرطان وتخفيف آثاره الجانبية.',
                'description_en' => 'Oncology is the medical specialty focused on the diagnosis and treatment of various types of cancer. This specialty includes treating solid tumors like breast, lung, and prostate cancer, as well as hematologic malignancies like leukemia and lymphoma. Oncologists use a range of treatments such as chemotherapy, radiation therapy, and surgery to manage cancer and mitigate its side effects.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الطوارئ',
                'title_en' => 'Emergency Medicine',
                'description_ar' => 'طب الطوارئ هو التخصص الطبي الذي يهتم بتقديم الرعاية الفورية والطارئة للمرضى المصابين بأمراض أو إصابات حادة. يعمل أطباء الطوارئ في غرف الطوارئ والمستشفيات لتقييم الحالات بسرعة وتقديم العلاج الفوري للحالات الحرجة مثل النوبات القلبية، الصدمات، والنزيف الحاد. يتطلب هذا التخصص معرفة شاملة بجميع المجالات الطبية وقدرة على اتخاذ قرارات سريعة.',
                'description_en' => 'Emergency Medicine is the medical specialty focused on providing immediate and urgent care to patients with acute illnesses or injuries. Emergency physicians work in emergency rooms and hospitals to quickly assess situations and deliver prompt treatment for critical conditions such as heart attacks, trauma, and severe bleeding. This specialty requires comprehensive knowledge of all medical fields and the ability to make rapid decisions.',
                'image' => 'assets/images/categories/1.png'
            ],
            [
                'title_ar' => 'طب الجهاز الهضمي',
                'title_en' => 'Gastroenterology',
                'description_ar' => 'طب الجهاز الهضمي هو التخصص الطبي الذي يركز على تشخيص وعلاج الأمراض التي تؤثر على الجهاز الهضمي بما في ذلك المريء، المعدة، الأمعاء، الكبد، والبنكرياس. أطباء الجهاز الهضمي يعالجون حالات مثل القرحة الهضمية، التهابات الأمعاء، أمراض الكبد، وسرطان القولون. يستخدمون تقنيات مثل التنظير الداخلي، الموجات فوق الصوتية، وتحاليل الدم لتشخيص ومعالجة هذه الحالات.',
                'description_en' => 'Gastroenterology is the medical specialty focused on diagnosing and treating diseases affecting the digestive system, including the esophagus, stomach, intestines, liver, and pancreas. Gastroenterologists treat conditions such as peptic ulcers, inflammatory bowel diseases, liver disorders, and colon cancer. They use techniques like endoscopy, ultrasound, and blood tests to diagnose and manage these conditions.',
                'image' => 'assets/images/categories/1.png'
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
