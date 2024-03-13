<?php
get_header('sustainability');
## Traz somente categorias filhas em primeiro grau
$cat_id = get_query_var('cat');
$term = get_queried_object();
?>

    <main id="main">
        <div class="container mt-3">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto">
                    <h2 class="title-carta">Deforestation is an insignificant risk in Marfrig’s production chain</h2>
                    <h3 class="subtile-title-carta">The company was a pioneer in combating deforestation in the Amazon for livestock production and today monitors its entire direct production chain and the vast majority of its indirect production.
                    </h3>

                    <div class="texto-carta">
                        <p>In 2009 Marfrig was the first food company in the world to sign a public commitment with Greenpeace and the Brazilian government establishing the criteria for livestock farming operations in the Amazon biome. The action aimed at avoiding the supply of cattle from deforested areas. This commitment was pioneering in the sector, since it concerns both legal deforestation, allowed by Brazil’s forestry legislation, and illegal deforestation.
                        </p>
                        <p>
                        To achieve the ambition of zero deforestation in its production line, in 2010 Marfrig developed a satellite geomonitoring program that tracks fire outbreaks in real time. Having such program, it started to monitor the suppliers of farms in the Amazon aiming to avoid the supply of cattle linked to deforestation, invasion of indigenous lands, preserved protected areas, and forced labor.
                        </p>
                        <p>
                        The process was successful and since 2012 production for Marfrig in the Amazon biome has been totally deforestation-free.
                        </p>

                        <p>
                        <strong>Commitment to zero deforestation throughout Brazil</strong> <br/>
                        In 2020 the company launched a new and broader program called Marfrig Verde+, whose main goal is to achieve total traceability of the production chain in all Brazilian biomes, including the cerrado (Brazilian savannah), by 2030.
                        </p>
                        <p>
                        The technology it uses is based on blockchain, and Marfrig Verde+ also includes a policy of reinserting blocked suppliers who wish to resolve their legal issues.
                        </p>
                        <p>
                        A risk map assessment was developed to support the deforestation-free supply chain until Marfrig Verde+ completion dates are met. To date, five levels of risks have been identified, and Marfrig has established procedures and resolution deadlines for each one. This way the company has been tracking and measuring progress on cattle traceability. Currently the status is as follows:
                        </p>
                            <ul>
                                <li>100% dos fornecedores diretos são monitorados e totalmente rastreáveis.</li>
                                <li>80% dos fornecedores indiretos do Bioma Amazônia são identificados e monitorados.</li>
                                <li>74% dos fornecedores indiretos do Bioma Cerrado são identificados e monitorados.</li>
                            </ul>
                        </p>
                        

                       <strong> No final de 2022, os marcos para o mapa de avaliação de riscos indicaram:</strong>
                        <ul>
                            <li>100% of direct suppliers are monitored and fully traceable.</li>
                            <li>80% of the indirect suppliers in the Amazon biome have been identified and are monitored.</li>
                            <li>74% of the indirect suppliers in the cerrado biome have been identified and are monitored.</li>
                        </ul>

                        <p>By the end of 2022, the risk assessment map indicated:</p>
                        <ul>
                            <li>100% of direct and indirect suppliers located in very high risk areas are monitored.</li>
                            <li>100% of direct and indirect suppliers located in high risk areas are monitored.</li>
                            <li>68.9% of direct and indirect suppliers located in medium risk areas are monitored.</li>
                            <li>71.5% of direct and indirect suppliers located in low-risk areas are monitored. </li>
                            <li>33.3% of direct and indirect suppliers located in very low-risk areas are monitored.</li>
                        </ul>

                        <p>
                        All in all, all of Marfrig’s direct suppliers are monitored. Among the indirect ones, the rate has already exceeded 70%, and the suppliers that are in risk areas classified as very high or high have also been 100% identified and are monitored. “Therefore, the risk of Marfrig’s products contributing to deforestation is insignificant,” said Paulo Pianez, Marfrig’s Sustainability director.
                        </p>

                        <strong>Marfrig’s positive track record</strong>
                        <p>
                        In recent years Marfrig has stood out in the main sustainability rankings, such as BBFAW, FAIRR, CDP, Forest 500 and Global Child Forum, which listed it as one of the best evaluated companies globally in its sector.
                        <p>
                        
                        <p>
                        The transparency of these actions is also guaranteed by Marfrig’s various approaches to communicating policies, commitments, advances and results. Those include information available on the company’s website, Annual Reports, Third-Party Audit Reports, webinars, events, and other means of communication, such as Prato do Amanhã, which is Marfrig’s content hub with daily content and which in this issue begins a series of monthly newsletters focused on sustainability in agriculture and livestock farming.
                        </p>
                            <br/>
                        

                        <a href="javascript:" class="leia-mais">read more</a>

                    </div>

                </div>
            </div> <!-- row -->
        </div>
        <!-- /.container -->
        
    </main>
    <!-- /#main -->

    <div class="container mt-5">
        <?php if (have_posts()): ?>
            <?php $countPosts = count($posts); ?>
            <?php $iPrintedPosts = 0; ?>
    
            <div class="row">
                <?php
                    $sectionPosts = 9;
                    $pointStop = $iPrintedPosts + $sectionPosts;
                    for($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                        if ($iPrintedPosts >= $pointStop) { break; }
                        $post = $posts[$iPrintedPosts];
                        $exclude_ids[] = $post->ID;
                ?>
    
                    <div class="col-12 col-md-6">
                        <div class="vertical-card-wrapper">
                            <?php get_template_part('inc/components/special-card-home-sustainability'); ?>
                        </div>
                    </div>
    
                <?php } ?>
            </div>
            <!-- /.row -->
    
    
        <?php else: ?>
        <?php endif; ?>
    </div>

<?php get_footer('sustainability'); ?>