<?php get_header(); ?>
<article class="about bottom-city">
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
                    'td' => 'AOR',
                ),
            );
            ?>

            <div class="aboutProfile pc-flex bet vcenter js-in anime bottom-in">
                <div class="">
                    <div class="aboutProfile__head flex h-center">
                        <p>きむら さえ</p>
                        <p class="aboutProfile__lit">|</p>
                        <p class="aboutProfile__eng aquatico">KIMURA SAE</p>
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
                <div class="aboutProfile__image">
                    <img src="<?php echo T_URL; ?>img/portrait.png" alt="">
                </div>
            </div>
        </section>
        <section class="about__career" id="career">
            <?php
            //  ##      ##   ####  ######
            //  ##      ##  ##       ##
            //  ##      ##   ###     ##
            //  ##      ##     ##    ##
            //  ######  ##  ####     ##

            $list = array(
                array(
                    'ym' => '2013年 ~ 2016年',
                    'ttl' => '茨城県立取手松陽高校美術課程 修了',
                    'txt' => '元来、絵を描くことや何かを創造したり表現することが大好きで、高校は美術科に進学し、作品作りに没頭しました。デッサンに明け暮れ、油画を描き、版画を作ったり、平面構成をしたり…。美術に思う存分没頭した高校生活は、私の宝物です。',
                ),
                array(
                    'ym' => '2016年 ~ 2019年',
                    'ttl' => '桑沢デザイン研究所 ファッションデザイン科　修了',
                    'txt' => '桑沢では基本的なデザインツールの操作や一眼レフカメラでの撮影技術、グラフィックデザインやプロダクトデザインなど多ジャンルのデザイン大枠を学んだのちにファッションデザインを専攻しました。
                    ファッションイラストの授業で学んだことは、今のイラストに活かされています。',
                ),
                array(
                    'ym' => '2019年 ~ 2020年',
                    'ttl' => '株式会社SPC　デザイナーアシスタント',
                    'txt' => '桑沢では基本的なデザインツールの操作や一眼レフカメラでの撮影技術、グラフィックデザインやプロダクトデザインなど一通り学んだのちにファッションデザインを専攻しました。
                    ファッションイラストの授業で学んだことは、今のイラストに活かされています。',
                ),
                array(
                    'ym' => '2020年　12月',
                    'ttl' => 'テラハウスICA　マークアップWEBデザイン実践科修了',
                    'txt' => '桑沢では基本的なデザインツールの操作や一眼レフカメラでの撮影技術、グラフィックデザインやプロダクトデザインなど一通り学んだのちにファッションデザインを専攻しました。
                    ファッションイラストの授業で学んだことは、今のイラストに活かされています。',
                ),
                array(
                    'ym' => '2021年～現在',
                    'ttl' => '株式会社SPC　WEBクリエイター',
                    'txt' => '桑沢では基本的なデザインツールの操作や一眼レフカメラでの撮影技術、グラフィックデザインやプロダクトデザインなど一通り学んだのちにファッションデザインを専攻しました。
                    ファッションイラストの授業で学んだことは、今のイラストに活かされています。',
                ),
            );
            ?>

            <h2 class="common__h3 about__h3">
                <span class="common__h3 common__h3--main">career</span>
                <span class="common__h3 common__h3--sub">経歴</span>
            </h2>
            <div class="aboutCareer">
                <div class="aboutCareer__line"></div>
                <div class="aboutCareer__table">
                    <?php
                    foreach ($list as $key => $value) {
                    ?>
                        <div class="aboutCareer__tr flex js-in anime bottom-in">
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
            <div class="aboutSkills">
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
                );
                foreach ($list as $key => $value) {
                ?>
                    <div class="aboutSkills__map">
                        <div class="aboutSkillsMap flex vcenter">
                            <div class="aboutSkillsMap__circle">
                                <div class="aboutSkillsMap__inner">
                                    <img src="<?php echo T_URL; ?>img/<?php echo $value['img']; ?>" class="aboutSkillsMap__icon">
                                    <p class="aboutSkillsMap__head"><?php echo nl2br($value['head']); ?></p>
                                </div>
                            </div>
                            <div class="aboutSkillsMap__gragh flex vcenter js-in anime flip-y">
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
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <?php get_template_part('parts-contact'); ?>
    </div>
</article>
<?php get_footer();
