<?php get_header(); ?>
<article class="about bottom-city">
    <div class="about__main wrap w1200 sp-wrap">
        <h1 class="common__h2 about__head pulsate">
            About
        </h1>
        <p class="about__lead">詳しい経歴やスキルを掲載しています。</p>
        <section class="about__profile double-border-box" id="profile">
            <div class="aboutProfile pc-flex bet vcenter">
                <div class="">
                    <div class="aboutProfile__head flex h-center">
                        <p>きむら さえ</p>
                        <p class="aboutProfile__lit">|</p>
                        <p class="aboutProfile__eng aquatico">KIMURA SAE</p>
                    </div>
                    <table class="aboutProfile__table">
                        <tr class="aboutProfile__tr">
                            <th class="aboutProfile__th">出生</th>
                            <td class="aboutProfile__td">1997年千葉県生まれ・東京都在住</td>
                        </tr>
                        <tr class="aboutProfile__tr">
                            <th class="aboutProfile__th">好きなこと</th>
                            <td class="aboutProfile__td">絵を描くこと・お菓子作り・散歩・昼寝・飲食店リサーチ</td>
                        </tr>
                        <tr class="aboutProfile__tr">
                            <th class="aboutProfile__th">好きな食べ物</th>
                            <td class="aboutProfile__td">スコーン・穴子・オニオンリング</td>
                        </tr>
                        <tr class="aboutProfile__tr">
                            <th class="aboutProfile__th">好きな音楽</th>
                            <td class="aboutProfile__td">AOR</td>
                        </tr>
                    </table>
                </div>
                <div class="aboutProfile__image">
                    <img src="<?php echo T_URL; ?>img/portrait.png" alt="">
                </div>
            </div>
        </section>
        <section class="about__career" id="career">
            <h2 class="common__h3 about__h3">
                <span class="common__h3 common__h3--main">career</span>
                <span class="common__h3 common__h3--sub">経歴</span>
            </h2>
            <div class="aboutCareer">
                <div class="aboutCareer__line"></div>
                <div class="aboutCareer__table">
                    <div class="aboutCareer__tr flex">
                        <p class="aboutCareer__th flex"><span class="aboutCareer__dot"></span>
                            2016年　3月
                        </p>
                        <div class="">
                            <div class="aboutCareer__td aboutCareer__td--head">茨城県立取手松陽高校美術課程 修了</div>
                            <div class="aboutCareer__td aboutCareer__td--txt">
                                <p>元来、絵を描くことや何かを創造したり表現することが大好きで、高校は美術科に進学しました。デッサンに明け暮れ、油画を描き、版画を作ったり、平面構成をしたり…。美術に思う存分没頭した高校生活は、私の宝物です。</p>
                            </div>
                        </div>
                    </div>
                    <div class="aboutCareer__tr flex">
                        <p class="aboutCareer__th flex"><span class="aboutCareer__dot"></span>
                            2019年　3月
                        </p>
                        <div class="">
                            <div class="aboutCareer__td aboutCareer__td--head">桑沢デザイン研究所 ファッションデザイン科　修了</div>
                            <div class="aboutCareer__td aboutCareer__td--txt">
                                <p>桑沢では基本的なデザインツールの操作や一眼レフカメラでの撮影技術、グラフィックデザインやプロダクトデザインなど一通り学んだのちにファッションデザインを専攻しました。<br>ファッションイラストの授業で学んだことは、今のイラストに活かされています。</p>
                            </div>
                        </div>
                    </div>
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
                        <i class="icon icon-about_dot-mark aboutSkillsIntroduction__dot txt-bright"></i>１〜５のメモリについて
                    </h3>
                    <div class="aboutSkills__text flex break">
                        <p class="aboutSkills__para">1 … 勉強を始めたばかり</p>
                        <p class="aboutSkills__para">2 … 概要の理解はできた</p>
                        <p class="aboutSkills__para">3 … 実践を重ねている最中</p>
                        <p class="aboutSkills__para">4 … 時間短縮が課題</p>
                        <p class="aboutSkills__para">5 … 実務で十分使用できる</p>
                    </div>
                </div>
                <div class="aboutSkills__map">
                    <div class="aboutSkillsMap flex vcenter">
                        <div class="aboutSkillsMap__circle">
                            <div class="aboutSkillsMap__inner">
                                <img src="<?php echo T_URL; ?>img/about_icon-ps.png" class="aboutSkillsMap__icon">
                                <p class="aboutSkillsMap__head">Photoshop</p>
                            </div>
                        </div>
                        <div class="aboutSkillsMap__gragh flex vcenter">
                            <div class="aboutSkillsMap__dot aboutSkillsMap__dot--normal"></div>
                            <div class="aboutSkillsMap__line"></div>
                            <div class="aboutSkillsMap__dot aboutSkillsMap__dot--normal"></div>
                            <div class="aboutSkillsMap__line"></div>
                            <div class="aboutSkillsMap__dot aboutSkillsMap__dot--normal"></div>
                            <div class="aboutSkillsMap__line"></div>
                            <div class="aboutSkillsMap__dot aboutSkillsMap__dot--normal"></div>
                            <div class="aboutSkillsMap__line"></div>
                            <i class="icon icon-about_dot-mark aboutSkillsMap__dot aboutSkillsMap__dot--mark txt-bright"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php get_template_part('parts-contact'); ?>
    </div>
</article>
<?php get_footer();
