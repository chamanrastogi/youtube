<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\StatsService;
use Illuminate\Database\Seeder;

/**
 * Realistic Milky / family Hindi comedy sample data.
 *
 * Rules: no emojis, Hindi (Devanagari) copy, no children characters.
 * Milky is a real dog with food / biscuit / pillow / sleep mischief.
 */
class StorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name' => 'Demo User',
                'password' => 'password',
            ],
        );

        foreach ($this->stories() as $story) {
            $user->stories()->updateOrCreate(
                ['title' => $story['title']],
                $story,
            );
        }

        app(StatsService::class)->seedGenerated($user, 12);
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function stories(): array
    {
        return [
            $this->story(
                title: 'मिल्की की बिस्किट चोरी',
                duration: 15,
                favorite: true,
                scenes: [
                    $this->scene(1, 0, 8, 'शुरुआत: बिस्किट की चोरी',
                        'शुरुआत में तेज़ सफेद लाइट फ्लैश, फिर रसोई में मिल्की डिब्बी की आवाज़ सुनकर कान खड़े करता है।',
                        'क्लोज़-अप, 9:16 वर्टिकल, मिल्की की आँखों पर फोकस।',
                        [['पापा', 'अरे ये बिस्किट की डिब्बी कौन खोल गया?'], ['मम्मी', 'मिल्की कहाँ है? शक तो इसी पर है।'], ['मिल्की', 'भौं!']],
                        'हल्का सितार और बाँसुरी।',
                        'बिस्किट वाली चाल'),
                    $this->scene(2, 8, 15, 'मज़ेदार अंत',
                        'मिल्की मासूम आँखें बनाकर पापा की गोद में सिर रख देता है और पूरा घर हँस पड़ता है।',
                        'मीडियम शॉट, धीमा पैन।',
                        [['दादी', 'अरे बेचारा है, इसे क्यों डाँटते हो?'], ['पापा', 'ठीक है, बस एक बिस्किट और।'], ['मिल्की', 'भौं भौं!']],
                        'कोमल हारमोनियम, अंत में शहनाई।',
                        'मिल्की ने सबको मात दी'),
                ],
            ),
            $this->story(
                title: 'मिल्की ने पूरा घर हिला दिया',
                duration: 20,
                favorite: false,
                scenes: [
                    $this->scene(1, 0, 10, 'शुरुआत: आटे की बारिश',
                        'तेज़ लाइट फ्लैश, फिर किचन में मिल्की आटे की थैली से खेलता है और पूरा फर्श सफेद हो जाता है।',
                        'वाइड शॉट, स्थिर कैमरा, पूरे किचन को कवर करता हुआ।',
                        [['मम्मी', 'रसोई में ये हाल किसने किया?'], ['पापा', 'मिल्की, इधर आओ।'], ['मिल्की', 'भौं!']],
                        'मज़ेदार बीट, बीच में ढोल की गूँज।',
                        'पूरा घर हिल गया'),
                    $this->scene(2, 10, 20, 'मज़ेदार अंत',
                        'मिल्की आटे से सना हुआ पापा के पीछे दौड़ता है और सोफे पर जाकर रुक जाता है।',
                        'हैंडहेल्ड ट्रैकिंग शॉट, मिल्की के पीछे-पीछे।',
                        [['पापा', 'मिल्की रुको!'], ['मम्मी', 'हँसी नहीं रुक रही।'], ['मिल्की', 'भौं भौं!']],
                        'चंचल पियानो और तबला।',
                        'पापा भी आटे में लिपटे'),
                ],
            ),
            $this->story(
                title: 'मिल्की और पापा की चप्पल',
                duration: 10,
                favorite: true,
                scenes: [
                    $this->scene(1, 0, 10, 'पूरी कहानी: चप्पल वाली चाल',
                        'शुरुआत में तेज़ सफेद लाइट फ्लैश, फिर मिल्की पापा की चप्पल मुँह में लेकर छुप जाता है, और अंत में मासूम आँखों से वापस लाकर रख देता है।',
                        'लो-एंगल शॉट, मिल्की की ऊँचाई से।',
                        [['पापा', 'मेरी चप्पल कहाँ गई?'], ['मिल्की', 'भौं भौं!'], ['मम्मी', 'छोड़ो, इसे बिस्किट दे दो।']],
                        'हल्का सितार, अंत में ढोलक।',
                        'चप्पल वापस, दिल जीत लिया'),
                ],
            ),
            $this->story(
                title: 'मिल्की की कीचड़ पार्टी',
                duration: 30,
                favorite: false,
                scenes: [
                    $this->scene(1, 0, 10, 'शुरुआत: बारिश का न्योता',
                        'तेज़ लाइट फ्लैश, फिर आँगन में बारिश हो रही है और मिल्की कीचड़ को देखकर पूंछ हिलाने लगता है।',
                        'मीडियम शॉट, धीमा पैन, बारिश की बूँदें कैमरे पर।',
                        [['मम्मी', 'मिल्की, अंदर आ जाओ!'], ['मिल्की', 'भौं!'], ['पापा', 'ये तो सुनने वाला नहीं।']],
                        'बारिश की आवाज़ के साथ हल्की बाँसुरी।',
                        'कीचड़ पार्टी शुरू'),
                    $this->scene(2, 10, 20, 'शरारत चरम पर',
                        'मिल्की कीचड़ में लोट-लोटकर खुद को नया रंग दे देता है और पूरे आँगन में दौड़ता है।',
                        'हैंडहेल्ड ट्रैकिंग, हल्का शेक।',
                        [['पापा', 'मिल्की! पूरा फर्श खराब!'], ['मम्मी', 'अब इसे नहलाना पड़ेगा।'], ['मिल्की', 'भौं भौं!']],
                        'तेज़ ढोल और तालियाँ।',
                        'नहाने की तैयारी'),
                    $this->scene(3, 20, 30, 'मज़ेदार अंत',
                        'पापा मिल्की को नहलाते हैं, मिल्की पानी से खेलता है और सब मिलकर हँसते हैं।',
                        'वाइड शॉट, पूरे आँगन को कवर करता हुआ।',
                        [['दादी', 'अरे बेचारा बारिश में खुश हो गया।'], ['पापा', 'चलो, अब सूख जाओ।'], ['मिल्की', 'भौं!']],
                        'हल्की शहनाई, फिर शांत संगीत।',
                        'सब हँसे, शरारत याद बन गई'),
                ],
            ),
            $this->story(
                title: 'मिल्की का चश्मा ड्रामा',
                duration: 15,
                favorite: false,
                scenes: [
                    $this->scene(1, 0, 8, 'शुरुआत: चश्मा चोरी',
                        'तेज़ लाइट फ्लैश, फिर मिल्की पापा का चश्मा उठाकर आईने के सामने पूरी मुद्रा बना लेता है।',
                        'क्लोज़-अप, मिल्की के चेहरे पर फोकस।',
                        [['पापा', 'मेरा चश्मा कहाँ गया?'], ['मिल्की', 'भौं!'], ['मम्मी', 'अरे ये तो मिल्की ने पहन लिया।']],
                        'हल्का हारमोनियम।',
                        'मिल्की बना प्रोफेसर'),
                    $this->scene(2, 8, 15, 'मज़ेदार अंत',
                        'मिल्की चश्मा गिरा देता है और मासूम बनकर सोफे के पीछे छुप जाता है।',
                        'ओवर-द-शोल्डर, पापा के पीछे से।',
                        [['पापा', 'मिल्की, चश्मा इधर दो।'], ['मिल्की', 'भौं भौं!'], ['मम्मी', 'छोड़ो, बस एक बिस्किट दो।']],
                        'मज़ेदार बीट, ढोल की थाप।',
                        'चश्मा मिल गया'),
                ],
            ),
            $this->story(
                title: 'मिल्की और तकिये का किला',
                duration: 20,
                favorite: true,
                scenes: [
                    $this->scene(1, 0, 10, 'शुरुआत: तकिये का ढेर',
                        'तेज़ लाइट फ्लैश, फिर मिल्की तकियों के ढेर पर कूदकर पूरे सोफे पर कब्जा कर लेता है।',
                        'लो-एंगल शॉट, हल्का टिल्ट।',
                        [['मम्मी', 'मिल्की, तकिये नीचे करो।'], ['मिल्की', 'भौं!'], ['पापा', 'ये तो अपना किला बना रहा है।']],
                        'हल्की बाँसुरी और तबला।',
                        'तकिये का किला'),
                    $this->scene(2, 10, 20, 'मज़ेदार अंत',
                        'मिल्की तकियों के बीच सिर छुपाकर सो जाता है और पूंछ बाहर हिलती रहती है।',
                        'क्लोज़-अप, पूंछ पर फोकस।',
                        [['दादी', 'अरे सोने दो, थक गया है।'], ['पापा', 'कमाल है, यहीं सो गया।'], ['मिल्की', 'भौं!']],
                        'शांत संगीत, अंत में हल्की शहनाई।',
                        'मिल्की सो गया'),
                ],
            ),
            $this->story(
                title: 'मिल्की की आम चोरी',
                duration: 10,
                favorite: false,
                scenes: [
                    $this->scene(1, 0, 10, 'पूरी कहानी: आम वाली चाल',
                        'शुरुआत में तेज़ सफेद लाइट फ्लैश, फिर मिल्की आम छुपाने की कोशिश में पूरा किचन हिला देता है, और अंत में मासूम आँखों से आम लौटा देता है।',
                        'मीडियम शॉट, धीमा पैन।',
                        [['मम्मी', 'एक आम कहाँ गया?'], ['मिल्की', 'भौं भौं!'], ['पापा', 'ये तो मासूम बन रहा है।']],
                        'चंचल पियानो और ढोलक।',
                        'आम वापस, पूंछ हिलती रही'),
                ],
            ),
            $this->story(
                title: 'मिल्की और दादी की ओखली',
                duration: 15,
                favorite: false,
                scenes: [
                    $this->scene(1, 0, 8, 'शुरुआत: आटे की चोरी',
                        'तेज़ लाइट फ्लैश, फिर दादी की ओखली से मिल्की आटा चुराकर पूरे आँगन में बिखेर देता है।',
                        'वाइड शॉट, स्थिर कैमरा।',
                        [['दादी', 'अरे ये आटा कौन बिखेर गया?'], ['मम्मी', 'दादी, मिल्की फिर शरारत कर रहा है।'], ['मिल्की', 'भौं!']],
                        'हल्का सितार और ढोलक।',
                        'आटे में मिल्की'),
                    $this->scene(2, 8, 15, 'मज़ेदार अंत',
                        'दादी मिल्की को प्यार से सहलाती हैं और मिल्की उनकी गोद में सिर रख देता है।',
                        'क्लोज़-अप, दादी और मिल्की पर।',
                        [['दादी', 'अरे बेचारा भूखा था।'], ['पापा', 'ठीक है, एक बिस्किट।'], ['मिल्की', 'भौं भौं!']],
                        'कोमल हारमोनियम।',
                        'दादी ने बचा लिया'),
                ],
            ),
        ];
    }

    /**
     * @param  list<array<string, mixed>>  $scenes
     * @return array<string, mixed>
     */
    private function story(string $title, int $duration, bool $favorite, array $scenes): array
    {
        $story = [
            'category' => 'Dog Comedy',
            'character' => 'Milky',
            'duration' => $duration,
            'language' => 'Hindi',
            'scenes' => $scenes,
            'favorite' => $favorite,
        ];

        $story['prompt'] = $this->videoPrompt($title, $duration, $scenes);
        $story['seo'] = $this->seo($title, $duration);

        return $story;
    }

    /**
     * @param  list<array{0: string, 1: string}>  $dialogue
     * @return array<string, mixed>
     */
    private function scene(
        int $index,
        int $start,
        int $end,
        string $title,
        string $visual,
        string $camera,
        array $dialogue,
        string $music,
        string $screenText,
    ): array {
        return [
            'index' => $index,
            'start' => $start,
            'end' => $end,
            'title' => $title,
            'visual' => $visual,
            'camera' => $camera,
            'dialogue' => array_map(
                static fn (array $line): array => ['speaker' => $line[0], 'line' => $line[1]],
                $dialogue,
            ),
            'music' => $music,
            'screen_text' => $screenText,
        ];
    }

    /**
     * @param  list<array<string, mixed>>  $scenes
     */
    private function videoPrompt(string $title, int $duration, array $scenes): string
    {
        $lines = [
            'Vertical 9:16 cinematic YouTube Shorts prompt.',
            'Title: '.$title.' | Character: Milky (real, expressive dog) | Duration: '.$duration.'s | Language: Hindi',
            'Style: warm middle-class Indian home, natural light, Hindi family comedy, handheld realism.',
            'Opening: Scene 1 starts with a sharp white light flash.',
        ];

        foreach ($scenes as $scene) {
            $dialogue = implode(' ', array_map(
                static fn (array $line): string => $line['speaker'].': '.$line['line'],
                $scene['dialogue'],
            ));
            $lines[] = sprintf(
                'Shot %d (%ds-%ds): %s | Camera: %s | Music: %s | On-screen text: %s | Dialogue: %s',
                $scene['index'],
                $scene['start'],
                $scene['end'],
                $scene['visual'],
                $scene['camera'],
                $scene['music'],
                $scene['screen_text'],
                $dialogue,
            );
        }

        $lines[] = 'Constraints: real dog behaviour only; no children characters; no emojis; output 1080x1920, 30fps.';

        return implode("\n", $lines);
    }

    /**
     * @return array<string, mixed>
     */
    private function seo(string $title, int $duration): array
    {
        return [
            'titles' => [
                $title,
                $title.' | मज़ेदार हिंदी कहानी',
                'मिल्की की नई शरारत: '.$title,
                $title.' | पूरा घर हँस पड़ा',
                'देखिए '.$title.' | Hindi Family Comedy',
            ],
            'description' => $title.' एक मज़ेदार हिंदी फैमिली कॉमेडी शॉर्ट है जिसमें मिल्की अपनी '
                .'मासूम शरारतों से पूरे घर को हँसा देता है। इस '.$duration.' सेकंड की कहानी में '
                .'बिस्किट, तकिया और नींद वाली मस्ती भरी है। अंत तक देखिए और बताइए कि मिल्की की '
                .'कौन सी शरारत सबसे मज़ेदार लगी।',
            'hashtags' => ['#MilkyKiKahani', '#HindiComedy', '#DogShorts', '#Shorts', '#FamilyComedy', '#FunnyDog'],
            'tags' => 'milky, hindi comedy, dog shorts, funny dog, family comedy, hindi kahani, youtube shorts',
            'thumbnail_text' => mb_substr($title, 0, 24),
            'hook' => 'मिल्की ने ऐसी शरारत की कि पूरा घर हँस पड़ा!',
            'pinned_comment' => 'आपको मिल्की की कौन सी शरारत सबसे मज़ेदार लगी? कमेंट में बताइए।',
            'cta' => 'अगर मिल्की पसंद आया तो लाइक, शेयर और चैनल को सब्सक्राइब करें।',
        ];
    }
}
