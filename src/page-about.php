<?php get_header(); ?>
<article class="about bottom-city">
    <div id="modalOverlay" class="md-overlay"></div>
    <?php
    /*
 ######     ###    ########  ######## ######## ########
##    ##   ## ##   ##     ## ##       ##       ##     ##
##        ##   ##  ##     ## ##       ##       ##     ##
##       ##     ## ########  ######   ######   ########
##       ######### ##   ##   ##       ##       ##   ##
##    ## ##     ## ##    ##  ##       ##       ##    ##
 ######  ##     ## ##     ## ######## ######## ##     ##
            */
    //  ##      ##   ####  ######
    //  ##      ##  ##       ##
    //  ##      ##   ###     ##
    //  ##      ##     ##    ##
    //  ######  ##  ####     ##

    $careerlist = array(
        array(
            'ym' => '2016年　3月',
            'ttl' => '茨城県立取手松陽高校美術課程 修了',
            'txt' => '元来「絵を描く」「何かを生み出す・作る」ということが好きで、美術分野を極めたいという思いから、高校は美術科に進学しました。基礎であるデッサンをはじめ、主に油絵とデザインを学びました。<br>この時の「物事を多角的に捉える視点」「情報を整理して絵を見た人に何を伝えていくか？」という心掛けは今も制作などをする上で強く繋がっている思考です。',
            'img' => array(
                'high01',
                'high02',
                'high03',
                'high04',
            ),
        ),
        array(
            'ym' => '2019年　3月',
            'ttl' => '桑沢デザイン研究所 ファッションデザイン科　修了',
            'txt' => '高校卒業後は桑沢デザイン研究所に進学し、Adobeソフトの扱い方や、一眼レフを用いた写真撮影方法などの基礎的なスキルを身に付けました。<br>2年次からはファッションデザイン科を専攻し、パターンや縫製などの授業で、服の構造や成り立ち方を論理的に理解していきました。元来直感的に物事を捉える傾向がありましたが、構造などをきちんと知った上で考えるデザインは一回りも二回りも説得力が生まれることを体感しました。桑沢での様々な学びを通して、論理的視点からもものづくりをしていくことを意識するようになりました。<br>卒業制作では「スモッキング」という、布を糸でかがり寄せて浮き上がる面白いテキスタイル表現を用いた洋服を制作しました。',
            'img' => array(
                'kuwa01',
                'kuwa02',
                'kuwa03',
                'kuwa04',
            ),
        ),
        array(
            'ym' => '2020年　4月',
            'ttl' => '株式会社PJC　デザイナーアシスタント　退職',
            'txt' => 'オリジナルの刺繍生地から衣類・雑貨の企画をし販売まで一貫して行うミセス向けアパレルブランドで企画アシスタントとして1年間、企画補佐や在庫管理、生産管理、接客、事務作業など様々な業務を経験しました。業務内容が多義にわたっていたため、優先順位を付けて効率よくこなせるように心掛けていました。',
            'img' => '',
        ),
        array(
            'ym' => '2020年　12月',
            'ttl' => 'テラハウスICA　マークアップWEBデザイン実践科　修了',
            'txt' => '元来興味のあったWeb業界に挑戦したいという思いから、自主学習と4ヶ月間の職業訓練でマークアップ言語とWEBデザインの基礎知識を習得。',
            'img' => '',
        ),
        array(
            'ym' => '2021年　5月',
            'ttl' => '株式会社フライングハイワークス　アルバイト　退職',
            'txt' => '訓練校の紹介で約半年弱、WEB制作会社の企画部にて既存サイトの更新業務やディレクター職補佐を担当。',
            'img' => '',
        ),
        array(
            'ym' => '2021年～',
            'ttl' => '株式会社SPC　WEBクリエイター',
            'txt' => 'WEBサイトやECサイトのデザイン、UI設計、フロント構築などを担当。',
            'img' => '',
        ),
    );
    ?>

    <?php
    foreach ($careerlist as $key => $value) {
        if ($value['img'] !== '') {
            $count = 0;
            foreach ($value['img'] as $img => $imgvalue) {    ?>
                <div class="about__modal js-modal js-modal--small-<?php echo nl2br($imgvalue); ?>">
                    <button type="button" class="about__bg js-modal-close"></button>
                    <button type="button" class="js-modal-close about__close flex vcenter hcenter">
                        <i class="about__closeIcon is-false icon-close"></i>
                    </button>
                    <div class="about__modalIn">
                        <img src="<?php echo T_URL; ?>img/big-<?php echo nl2br($imgvalue); ?>.jpg" class="aboutModal__img">
                    </div>
                    <div class="about__nonScroll"></div>
                </div>
    <?php
                $count++;
            }
        }
    }
    ?>
    <div class="about__main wrap w1200 sp-wrap">
        <h1 class="common__h2 about__head pulsate js-in anime flip-x">
            About
        </h1>
        <p class="about__lead js-in anime bottom-in">詳しい経歴やスキルを掲載しています。</p>
        <section class="about__profile double-border-box js-in anime bottom-in" id="profile">
            <?php
            //  ##      ##   ####  ######
            //  ##      ##  ##       ##
            //  ##      ##   ###     ##
            //  ##      ##     ##    ##
            //  ######  ##  ####     ##

            $list = array(
                array(
                    'th' => '出生',
                    'td' => '1997年千葉県生まれ・東京都在住',
                ),
                array(
                    'th' => '好きなこと',
                    'td' => '絵を描くこと・お菓子作り・散歩・昼寝・飲食店リサーチ',
                ),
                array(
                    'th' => '好きな食べ物',
                    'td' => 'スコーン・穴子・オニオンリング',
                ),
                array(
                    'th' => '好きな音楽',
                    'td' => 'AOR・R&B',
                ),
            );
            ?>

            <div class="aboutProfile pc-flex bet vcenter js-in anime bottom-in">
                <div class="">
                    <div class="aboutProfile__head flex h-center v-center">
                        <p>きむら さえ
                            <span class="aboutProfile__lit">|</span>
                            <span class="aboutProfile__eng aquatico">KIMURA SAE</span>
                        </p>
                    </div>
                    <div class="aboutProfile__image sp">
                        <img src="<?php echo T_URL; ?>img/portrait.png" alt="">
                    </div>
                    <table class="aboutProfile__table">
                        <?php
                        foreach ($list as $key => $value) {
                        ?>
                            <tr class="aboutProfile__tr">
                                <th class="aboutProfile__th"><?php echo nl2br($value['th']); ?></th>
                                <td class="aboutProfile__td"><?php echo nl2br($value['td']); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="aboutProfile__image pc">
                    <img src="<?php echo T_URL; ?>img/portrait.png" alt="">
                </div>
            </div>
        </section>
        <section class="about__career" id="career">
            <?php
            /*
 ######     ###    ########  ######## ######## ########
##    ##   ## ##   ##     ## ##       ##       ##     ##
##        ##   ##  ##     ## ##       ##       ##     ##
##       ##     ## ########  ######   ######   ########
##       ######### ##   ##   ##       ##       ##   ##
##    ## ##     ## ##    ##  ##       ##       ##    ##
 ######  ##     ## ##     ## ######## ######## ##     ##
            */
            //  ##      ##   ####  ######
            //  ##      ##  ##       ##
            //  ##      ##   ###     ##
            //  ##      ##     ##    ##
            //  ######  ##  ####     ##
            ?>

            <h2 class="common__h3 about__h3">
                <span class="common__h3 common__h3--main">CAREER</span>
                <span class="common__h3 common__h3--sub">経歴</span>
            </h2>
            <div class="aboutCareer">
                <div class="aboutCareer__line"></div>
                <div class="aboutCareer__table">
                    <?php
                    foreach ($careerlist as $key => $value) {
                    ?>
                        <div class="aboutCareer__tr pc-flex js-in anime bottom-in">
                            <p class="aboutCareer__th flex"><span class="aboutCareer__dot"></span>
                                <?php echo nl2br($value['ym']); ?>
                            </p>
                            <div class="">
                                <div class="aboutCareer__td aboutCareer__td--head">
                                    <p><?php echo nl2br($value['ttl']); ?></p>
                                </div>
                                <div class="aboutCareer__td aboutCareer__td--txt">
                                    <p><?php echo nl2br($value['txt']); ?></p>
                                </div>
                                <?php
                                if ($value['img'] !== '') { ?>
                                    <div class="aboutCareer__imageline flex bet">
                                        <?php
                                        foreach ($value['img'] as $img => $imgvalue) {
                                        ?>
                                            <div class="aboutCareer__img">
                                                <button type="button" class="js-modal js-modal-open" data-modal="small-<?php echo nl2br($imgvalue); ?>">
                                                    <img src="<?php echo T_URL; ?>img/small-<?php echo nl2br($imgvalue); ?>.jpg" alt="">
                                                </button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                } else { ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="about__skills" id="skills">
            <h2 class="common__h3 about__h3">
                <span class="common__h3 common__h3--main">SKILLS</span>
                <span class="common__h3 common__h3--sub">使えるツールや言語など</span>
            </h2>
            <div class="aboutSkills flex break sp-bet">
                <?php /*
                <div class="aboutSkillsIntroduction">
                    <h3 class="aboutSkillsIntroduction__head">
                        <i class="icon icon-about_dot-mark aboutSkillsIntroduction__dot txt-bright"></i>バーのメモリについて
                    </h3>
                    <div class="aboutSkills__text flex break">
                        <p class="aboutSkills__para">1 … 概要の理解をしている</p>
                        <p class="aboutSkills__para">2 … 調べながら業務で使用できる</p>
                        <p class="aboutSkills__para">3 … 実務で使えるが時短が目標</p>
                        <p class="aboutSkills__para">4 … 十分使いこなせる</p>
                    </div>
                </div>
                */ ?>
                <?php
                //  ##      ##   ####  ######
                //  ##      ##  ##       ##
                //  ##      ##   ###     ##
                //  ##      ##     ##    ##
                //  ######  ##  ####     ##

                $list = array(
                    array(
                        'img' => 'about_icon_xd.png',
                        'head' => 'XD',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon-ps.png',
                        'head' => 'Photoshop',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon_ai.png',
                        'head' => ' Illustrator',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon_ae.png',
                        'head' => ' AfterEffect',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon_figma.png',
                        'head' => ' Figma',
                        'score' => '1',
                    ),
                    array(
                        'img' => 'about_icon_html.png',
                        'head' => 'HTML',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon_css.png',
                        'head' => 'CSS',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon_js.png',
                        'head' => 'JavaScript',
                        'score' => '3',
                    ),
                    array(
                        'img' => 'about_icon_php.png',
                        'head' => 'PHP',
                        'score' => '2',
                    ),
                    array(
                        'img' => 'about_icon_wp.png',
                        'head' => 'Wordpress',
                        'score' => '2',
                    ),
                    array(
                        'img' => 'about_icon_webflow.png',
                        'head' => 'webflow',
                        'score' => '2',
                    ),
                    array(
                        'img' => 'about_icon_github.png',
                        'head' => 'github',
                        'score' => '2',
                    ),
                );
                foreach ($list as $key => $value) {
                ?>
                    <div class="aboutSkills__map flex">
                        <div class="aboutSkillsMap js-in anime bottom-in">
                            <div class="aboutSkillsMap__circle">
                                <div class="aboutSkillsMap__inner">
                                    <img src="<?php echo T_URL; ?>img/<?php echo $value['img']; ?>" class="aboutSkillsMap__icon">
                                    <p class="aboutSkillsMap__head"><?php echo nl2br($value['head']); ?></p>
                                </div>
                            </div>
                            <?php /*
                            <div class="aboutSkillsMap__gragh flex vc enter js-in anime flip-y">
                                <?php
                                $counter = 0;
                                $score = $value['score'];
                                while ($counter <= 3) {
                                ?>
                                    <?php
                                    if ($counter == $score) {
                                    ?>
                                        <i class="icon icon-about_dot-mark aboutSkillsMap__dot aboutSkillsMap__dot--mark txt-bright"></i>
                                    <?php } else {
                                    ?>
                                        <div class="aboutSkillsMap__dot aboutSkillsMap__dot--normal"></div>
                                    <?php }
                                    ?>
                                    <?php
                                    if ($counter !== 3) {
                                    ?>
                                        <div class="aboutSkillsMap__line"></div>
                                <?php }
                                    $counter++;
                                }
                                ?>
                            </div>
                            */ ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <?php /*
########  ##     ## #### ##        #######   ######   #######  ########  ##     ## ##    ##
##     ## ##     ##  ##  ##       ##     ## ##    ## ##     ## ##     ## ##     ##  ##  ##
##     ## ##     ##  ##  ##       ##     ## ##       ##     ## ##     ## ##     ##   ####
########  #########  ##  ##       ##     ##  ######  ##     ## ########  #########    ##
##        ##     ##  ##  ##       ##     ##       ## ##     ## ##        ##     ##    ##
##        ##     ##  ##  ##       ##     ## ##    ## ##     ## ##        ##     ##    ##
##        ##     ## #### ########  #######   ######   #######  ##        ##     ##    ##
  */ ?>
        <section class="about__philosophy aboutPhilosophy" id="philosophy">
            <h2 class="common__h3 about__h3">
                <span class="common__h3 common__h3--main">PHILOSOPHY</span>
                <span class="common__h3 common__h3--sub">大切にしていること</span>
            </h2>
            <div class="aboutPhilosophy__box double-border-box js-in anime bottom-in">
                <div class="aboutPhilosophy__image">
                    <img src="<?php echo T_URL; ?>img/ben_outline.png" alt="">
                </div>
                <div class="aboutPhilosophy__top">
                    <div class="pc-flex bet">
                        <?php /*
                        <div class="aboutPhilosophy__point">
                            <p class="aboutPhilosophy__title">周囲から学ぶ</p>
                            <p class="aboutPhilosophy__int">たとえ自身が上に立つ場面であって<br class="pc notfull">も常に謙虚な姿勢でいることを<br class="pc notfull">心がけます。<br class="pc notfull">他者のよいところから学び、<br class="pc notfull">反省と改善から自己成長に繋げる<br class="pc notfull">ことを意識しています。</p>
                        </div> */ ?>
                        <div class="aboutPhilosophy__point">
                            <p class="aboutPhilosophy__title">ユーザー視点に立つ</p>
                            <p class="aboutPhilosophy__int">デザインをする時は必ず小まめに<br class="pc notfull">ユーザー視点に立ち返ることを<br class="pc notfull">徹底します。<br class="pc notfull">使う人にとって、分かりやすいか？<br class="pc notfull">伝わりやすいか？易しいか？<br class="pc notfull">はデザインの原点だと考えます。</p>
                        </div>
                        <div class="aboutPhilosophy__point aboutPhilosophy__point--right">
                            <p class="aboutPhilosophy__title aboutPhilosophy__title--right">チームワークを重んじる</p>
                            <p class="aboutPhilosophy__int">チームでは周囲に目を配り<br class="pc notfull">声掛けとコミュニケーションを<br class="pc notfull">率先するポジションです。<br class="pc notfull">互いが対等に意見を出し合える<br class="pc notfull">環境を作ることで、クオリティの<br class="pc notfull">向上に繋がると信じています。</p>
                        </div>
                    </div>
                </div>
                <div class="aboutPhilosophy__bottom">
                    <div class="pc-flex bet vend">
                        <div class="aboutPhilosophy__point">
                            <p class="aboutPhilosophy__title">傾聴する</p>
                            <p class="aboutPhilosophy__int">相手に興味を持ち、様々な質問<br class="pc notfull">をします。クライアントワーク<br class="pc notfull">では他者理解と共感を深めること<br class="pc notfull">で問題解決の糸口を探ります。<br class="pc notfull">傾聴することで、多角的な視点で<br class="pc notfull">考えるクセが付くように思います。</p>
                        </div>
                        <div class="aboutPhilosophy__point aboutPhilosophy__point--right">
                            <p class="aboutPhilosophy__title aboutPhilosophy__title--right">日々インプットする</p>
                            <p class="aboutPhilosophy__int">WEBやデザインなど<br class="sp-hide notfull">仕事に関係する知識はもちろん、<br class="sp-hide notfull">日常の些細なことまで<br class="sp-hide notfull">あらゆることに疑問を投げかけ、<br class="sp-hide notfull">放置せず調べたり勉強したりする<br class="sp-hide notfull">姿勢を大切にしています。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php /*
 ######   #######  ##    ##  ######  ######## ########  ########
##    ## ##     ## ###   ## ##    ## ##       ##     ##    ##
##       ##     ## ####  ## ##       ##       ##     ##    ##
##       ##     ## ## ## ## ##       ######   ########     ##
##       ##     ## ##  #### ##       ##       ##           ##
##    ## ##     ## ##   ### ##    ## ##       ##           ##
 ######   #######  ##    ##  ######  ######## ##           ##
  */ ?>
        <section class="about__concept aboutConcept" id="concept">
            <h2 class="common__h3 about__h3 js-in anime bottom-in">
                <span class="common__h3 common__h3--main">SMALL TALK</span>
                <span class="common__h3 common__h3--sub">このサイトのコンセプト</span>
            </h2>
            <p class="aboutConcept__txt js-in anime bottom-in">
                私の好きなものの一つが、80年代のあらゆるポップカルチャーです。<br class="sp-hide">音楽、ゲーム、ファッション、映画…<br class="sp-hide">おこがましくも、なぜだか「80年代への郷愁」を感じずにはいられません。<br class="sp-hide">その中でも「サイバーパンク」「シンセウェイブ」など<br class="sp-hide">レトロだけど近未来的な、妖しい世界観をサイトに落とし込もうと決めました。<br class="sp-hide"><br>このポートフォリオサイトは<br class="sp-hide">私の表現や日々の思考を具現化した一つの「街」のような空間です。<br class="sp-hide">都会のキラキラしたネオンも大好きな私は、<br class="sp-hide">それらを見るとドキドキやワクワクを感じます。<br class="sp-hide">自身がアートワークを通して生涯追求したいことの一つは<br class="sp-hide">「見た人にときめきやワクワクを感じてもらうこと」です。<br class="sp-hide"><br>このサイト≒街を訪れて下さった方にも<br class="sp-hide">そんな気持ちを感じてもらえたら嬉しいな、と思いながら制作しました。
            </p>
        </section>
        <div class="about__contact">
            <?php get_template_part('parts-contact'); ?>
        </div>
    </div>
</article>
<?php get_footer();
