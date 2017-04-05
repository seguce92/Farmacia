<?php

use Illuminate\Database\Seeder;

class FcategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fcategorias')->delete();
        
        \DB::table('fcategorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Analgésico',
            'descripcion' => 'Un analgésico es un medicamento para calmar o eliminar el dolor, ya sea de cabeza, muscular, de artrítis, etc. Existen diferentes tipos de analgésicos y cada uno tiene sus ventajas y riesgos. Etimológicamente procede del prefijo griego an- (‘carencia, negación’) y άλγος (/álgos/, ‘dolor’).',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Anestésico',
            'descripcion' => 'La anestesia (del gr. ἀναισθησία, que significa "insensibilidad") es un acto médico controlado en el que se usan fármacos para bloquear la sensibilidad táctil y dolorosa de un paciente, sea en todo o parte de su cuerpo y sea con o sin compromiso de conciencia.',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Ansiolítico',
                'descripcion' => 'Un ansiolítico o tranquilizante menor es un fármaco psicotrópico con acción depresora del sistema nervioso central, destinado a disminuir o eliminar los síntomas de la ansiedad sin producir sedación o sueño. Su efecto inhibidor de la ansiedad se contrapone al de los fármacos ansiogénicos que generan ansiedad. Ambos fármacos ansiolíticos y ansiogénicos, se incluyen dentro de la categoría de fármacos ansiotrópicos.',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Antibiótico',
            'descripcion' => 'Un antibiótico, considerando la etimología (del griego αντί - anti, "en contra" + βιοτικός - biotikos, "dado a la vida"1 2 ) es una sustancia química producida por un ser vivo o derivado sintético, que mata o impide el crecimiento de ciertas clases de microorganismos sensibles, generalmente son fármacos usados en el tratamiento de infecciones por bacterias, de ahí que se les conozca como antibacterianos. Los antibióticos se utilizan en medicina humana, animal y horticultura para tratar infecciones provocadas por gérmenes. Normalmente los antibióticos presentan toxicidad selectiva, siendo muy superior para los organismos invasores que para los animales o los seres humanos que los hospedan,3 aunque ocasionalmente puede producirse una reacción adversa medicamentosa, como afectar a la flora bacteriana normal del organismo. Los antibióticos generalmente ayudan a las defensas de un individuo hasta que las respuestas locales sean suficientes para controlar la infección.4 Un antibiótico es bacteriostático si impide el crecimiento de los gérmenes, y bactericida si los destruye,5 pudiendo generar también ambos efectos, según los casos.6',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Anticolinérgico',
                'descripcion' => 'Un agente anticolinérgico es un compuesto farmacéutico que sirve para reducir o anular los efectos producidos por la acetilcolina en el sistema nervioso central y el sistema nervioso periférico.',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Anticonceptivo',
                'descripcion' => 'Un método anticonceptivo es «cualquier acto, dispositivo o medicación para impedir una concepción o un embarazo viable».1 También es llamado anticoncepción o contracepción. Se usa en vistas del control de la natalidad.2 La planificación, provisión y uso de métodos anticonceptivos es llamado planificación familiar.3 4 Los métodos anticonceptivos se han utilizado desde tiempos antiguos, pero aquellos eficaces y seguros no estuvieron disponibles hasta el siglo XX.5 Algunas culturas restringen o desalientan el acceso al control de la natalidad, ya que consideran que es moral, religiosa o políticamente indeseable.',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Antiepiléptico',
            'descripcion' => 'El antiepiléptico (también llamado anticonvulsivo o F.A.E., acrónimo de "fármaco anti-epiléptico" ) es un término que se refiere a un fármaco, u otra substancia destinada a combatir, prevenir o interrumpir las convulsiones o los ataques epilépticos. Suele llamársele antiepiléptico aunque existen otros tipos de convulsiones no asociadas a la epilepsia como: el síndrome convulsivo febril del niño y las convulsiones producidas por la retirada brusca de tóxicos y fármacos depresores del sistema nervioso central; sin embargo estos eventos no requieren de un uso regular de un fármaco.',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Antidepresivo',
            'descripcion' => 'Un antidepresivo es un medicamento psicotrópico utilizado para tratar los trastornos depresivos mayores, que pueden aparecer en forma de uno o más episodios a lo largo de la vida, diversos trastornos de ansiedad, ciertos desórdenes de la conducta alimentaria y alteraciones del control de los impulsos. A veces son eficaces para tratar la fase depresiva del trastorno bipolar, aunque existe el riesgo de sufrir un viraje maníaco. Los antidepresivos se dividen en tres clases: los inhibidores de la monoaminooxidasa (IMAO), los tricíclicos, y los de segunda generación, muy recetados actualmente en psiquiatría por la menor cantidad y probabilidad de sufrir efectos secundarios, que actúan sobre la recaptación de los tres principales neurotransmisores que intervienen en la depresión, es decir, la serotonina, la noradrenalina (o norepinefrina) y la dopamina, o de dos de ellos. Para el tratamiento de otras patologías, como el insomnio o el dolor neuropático, las dosis son significativamente más bajas que las utilizadas para tratar la depresión clínica.

',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Antiemético',
            'descripcion' => 'Normalmente referido a fármacos, aquellos que impiden el vómito (emesis) o la náusea. Típicamente se usan para tratar cinetosis y los efectos secundarios de los analgésicos opioides, de los anestésicos generales y de la quimioterapia dirigida contra el cáncer.',
                'created_at' => '2017-04-04 18:20:15',
                'updated_at' => '2017-04-04 18:20:33',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Antihelmíntico',
                'descripcion' => 'En medicina humana y veterinaria, un antihelmíntico es un medicamento utilizado en el tratamiento de las helmintiasis, es decir las infestaciones por vermes, helmintos o lombrices. Los antihelmínticos provocan la erradicación de las lombrices parásitas del cuerpo de manera rápida y completa, ya sea matándolos o incitando en ellos una conducta de huida que disminuye la carga parasitaria y sin dejar complicaciones de la infestación.2 Un sinónimo de antihelmíntico, ampliamente usado para los remedios tradicionales de este tipo, es vermífugo.',
                'created_at' => '2017-04-04 18:21:00',
                'updated_at' => '2017-04-04 18:21:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Antihistamínico',
                'descripcion' => 'Un antihistamínico es un fármaco que sirve para reducir o eliminar los efectos de las alergias, que actúa bloqueando la acción de la histamina en las reacciones alérgicas, a través del bloqueo de sus receptores. La histamina es una sustancia química que se libera en el cuerpo durante las reacciones alérgicas',
                'created_at' => '2017-04-04 18:21:26',
                'updated_at' => '2017-04-04 18:21:26',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Antineoplásico',
                'descripcion' => 'Los antineoplásicos son sustancias que impiden el desarrollo, crecimiento, o proliferación de células tumorales malignas. Estas sustancias pueden ser de origen natural, sintético o semisintético.

Según el mecanismo de acción se clasifican básicamente de dos tipos, aquellos que actúan contra la célula tumoral en un determinado ciclo de la división celular denominados ciclo-específicos y aquellos ciclo-inespecífico que afectan a la célula durante todo su ciclo de desarrollo.',
                'created_at' => '2017-04-04 18:21:51',
                'updated_at' => '2017-04-04 18:21:51',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Antiinflamatorio',
                'descripcion' => 'El término antiinflamatorio se aplica al medicamento o procedimiento médico usados para prevenir o disminuir la inflamación de los tejidos.

En el caso de los medicamentos generalmente el mecanismo por el cual actúan es el de impedir o inhibir la biosíntesis de sus agentes mediadores, principalmente los denominados eicosanoides o derivados del ácido araquidónico.1

Los procedimientos antiinflamatorios son en general medidas físicas como reposo e inmovilización, hipotermia o crioterapia localizada, elevación y compresión de la extremidad afectada, y que generalmente se recomiendan aplicar en forma primaria e inmediata y de uso muy común para tratamientos de lesiones en deportistas.',
                'created_at' => '2017-04-04 18:22:38',
                'updated_at' => '2017-04-04 18:22:38',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Antiparkinsoniano',
                'descripcion' => 'contra los síntomas de la enfermedad de Parkinson',
                'created_at' => '2017-04-04 18:23:35',
                'updated_at' => '2017-04-04 18:23:35',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'Antimicótico',
            'descripcion' => 'Se entiende por antifúngico o antimicótico a toda sustancia que tiene la capacidad de evitar el crecimiento de algunos tipos de hongos o incluso de provocar su muerte. Dado que los hongos además de tener usos beneficiosos para el ser humano (levadura del pan, hongos de fermentación de los quesos, los vinos, la cerveza, entre otros muchos ejemplos) forman parte del colectivo de seres vivos que pueden originar enfermedades en el ser humano, el conocimiento y uso de los antifúngicos es de vital importancia a la hora de tratar muchas enfermedades.',
                'created_at' => '2017-04-04 18:23:55',
                'updated_at' => '2017-04-04 18:24:23',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'nombre' => 'Antipirético',
                'descripcion' => 'Se denomina antipirético, antitérmico, antifebril y febrífugo a todo fármaco que hace disminuir la fiebre. Suelen ser medicamentos que tratan la fiebre de una forma sintomática, sin actuar sobre su causa. Los ejemplos más comunes son el ácido acetilsalicílico, el ibuprofeno, el paracetamol y el metamizol.',
                'created_at' => '2017-04-04 18:24:45',
                'updated_at' => '2017-04-04 18:24:45',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'nombre' => 'antipsicótico',
                'descripcion' => 'Un neuroléptico o antipsicótico es un fármaco que comúnmente, aunque no exclusivamente, se usa para el tratamiento de las psicosis. Los neurolépticos ejercen modificaciones fundamentalmente en el cerebro y están indicados especialmente en casos de esquizofrenia para, por ejemplo, hacer desaparecer las alucinaciones y en trastornos bipolares para tratar episodios maníacos con o sin síntomas psicóticos. Generalmente —en dosis terapéuticas— no presentan efectos hipnóticos. Se han desarrollado varias generaciones de neurolépticos, la primera la de los antipsicóticos típicos, descubiertos en la década de 1950. La segunda generación constituye un grupo de antipsicóticos atípicos, de descubrimiento más reciente y de mayor uso en la actualidad. Ambos tipos de medicamentos, los típicos y los atípicos, tienden a bloquear los receptores de la vía de la dopamina en el cerebro. Algunos efectos colaterales incluyen la ganancia de peso, agranulocitosis, discinesia y acatisia tardía.',
                'created_at' => '2017-04-04 18:25:13',
                'updated_at' => '2017-04-04 18:25:13',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'nombre' => 'Antídoto',
                'descripcion' => 'Un antídoto es una sustancia química cuya función es contrarrestar los efectos de un veneno, toxina o químico.

Los antídotos más comunes son los creados por el hombre, mediante la sintetización de otras sustancias químicas. En ocasiones, el mismo veneno o toxina (especialmente en el caso del veneno de vipéridos) sirve como base para la sintetización y elaboración de estos antídotos.',
                'created_at' => '2017-04-04 18:25:51',
                'updated_at' => '2017-04-04 18:25:51',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'nombre' => 'Broncodilatador',
                'descripcion' => 'Un broncodilatador es una sustancia, generalmente un medicamento, que causa que los bronquios y bronquiolos de los pulmones se dilaten, provocando una disminución en la resistencia aérea y permitiendo así el flujo de aire. Un broncodilatador puede ser endógeno, es decir, que se origina dentro del cuerpo o un medicamento que se administra con el fin de tratar dificultades para respirar, especialmente útiles en enfermedades obstructivas crónicas como el asma o EPOC. Los broncodilatadores tienen efectos controvertidos y aún no se ha demostrados su importancia en la bronquiolitis y otras enfermedades pulmonares restrictivas.',
                'created_at' => '2017-04-04 18:26:19',
                'updated_at' => '2017-04-04 18:26:19',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'nombre' => 'Cardiotónico',
            'descripcion' => 'Un cardiotónico es una sustancia de naturaleza esteroídica que debido a su acción a nivel cardiaco provoca un aumento de la frecuencia (cronotropico), excitabilidad (batmotropico) y contractilidad (inotropico) de las fibras miocárdicas.',
                'created_at' => '2017-04-04 18:26:40',
                'updated_at' => '2017-04-04 18:26:40',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'nombre' => 'Citostático',
                'descripcion' => 'La quimioterapia es una técnica terapéutica que consiste en la administración de sustancias químicas para el tratamiento de una enfermedad.

Actualmente es uno de los métodos terapéuticos más empleados en el tratamiento del cáncer, usando para ello una amplia variedad de fármacos antineoplásicos.',
                'created_at' => '2017-04-04 18:27:07',
                'updated_at' => '2017-04-04 18:27:07',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'nombre' => 'Hipnótico',
                'descripcion' => 'Los fármacos somníferos e hipnóticos son drogas psicotrópicas psicoactivas que inducen somnolencia y sueño. Se los puede dividir en dos grupos principales según su uso y vías de administración.',
                'created_at' => '2017-04-04 18:27:28',
                'updated_at' => '2017-04-04 18:27:28',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'nombre' => 'Hormona',
            'descripcion' => 'Las hormonas son sustancias segregadas por células especializadas, localizadas en glándulas endocrinas (carentes de conductos), o también por células epiteliales e intersticiales cuyo fin es el de influir en la función de otras células.',
                'created_at' => '2017-04-04 18:27:51',
                'updated_at' => '2017-04-04 18:27:51',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'nombre' => 'Quimioterapia',
                'descripcion' => 'La quimioterapia es una técnica terapéutica que consiste en la administración de sustancias químicas para el tratamiento de una enfermedad.

Actualmente es uno de los métodos terapéuticos más empleados en el tratamiento del cáncer, usando para ello una amplia variedad de fármacos antineoplásicos.',
                'created_at' => '2017-04-04 18:28:14',
                'updated_at' => '2017-04-04 18:28:14',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'nombre' => 'Relajante muscular',
                'descripcion' => 'Que provoca relajación muscular. Se utiliza, habitualmente, para referirse a fármacos con propiedades antiespásticas.',
                'created_at' => '2017-04-04 18:28:36',
                'updated_at' => '2017-04-04 18:28:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}