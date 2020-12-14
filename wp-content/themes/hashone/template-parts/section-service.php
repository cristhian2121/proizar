<?php
/**
 *
 * @package HashOne
 */
$hashone_page = '';
$hashone_page_array = get_pages();
if (is_array($hashone_page_array)) {
    $hashone_page = $hashone_page_array[0]->ID;
}

if (get_theme_mod('hashone_disable_service_sec') != 'on') {
    ?>
    <section id="hs-service-post-section" class="hs-section">
        <div class="hs-service-left-bg"></div>
        <div class="hs-container">
            <div class="hs-service-posts">
                <?php
                $hashone_service_title = get_theme_mod('hashone_service_title', esc_html__('Why Choose Us', 'hashone'));
                $hashone_service_sub_title = get_theme_mod('hashone_service_sub_title', esc_html__('Let us do all things for you', 'hashone'));
                ?>

                <?php if ($hashone_service_title) { ?>
                    <!-- <h2 class="hs-section-title wow fadeInUp" data-wow-duration="0.5s"><?php echo esc_html($hashone_service_title); ?></h2> -->
                <?php } ?>

                <?php if ($hashone_service_sub_title) { ?>
                    <!-- <div class="hs-section-tagline wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo esc_html($hashone_service_sub_title); ?></div> -->
                <?php } ?>

                <div class="hs-service-post-wrap">
                    <?php
                        
                        // <!-- Todo: pass to variables KameHouse -->
                        $services_actives = array(
                            'Diseños de sistemas de seguridad y salud en el trabajo' => 
                                "El diseño del sistema de gestión de la seguridad y salud en el trabajo está dirigido a empresas que por primera vez incorporarán este sistema en sus procesos misionales",
                            'Implementación del sistema de seguridad y salud en el trabajo' => 
                                "Para la implementación del sistema se tienen en cuenta la autoevaluación de las condiciones iniciales realizada bajo el diagnostico de la resolución 0312 de 2019 y las actividades del plan anual de trabajo, el cronograma de capacitación y formación",
                            'Investigación de incidentes, accidentes y enfermedades laborales' => 
                                "Se realiza la investigación de acuerdo con las directrices del ministerio de trabajo y las guías que instaura el ministerio de salud.",
                            'Diseño del plan de emergencias' => 
                                "el plan de emergencias se establece con el objetivo de preparar a las empresas frente a una eventual emergencia que puede ser causada por eventos de origen natural, tecnológico y social.",
                            'Capacitación y entrenamiento a brigadas' => 
                                "Con el propósito de que las personas actuén de manera adecuada y oportuna ante una emergencia, salvaguardando su propia vida y de las personas que estén rodeadas. proceso estipulado bajo la de la resolución 256 de 2014.",
                            'Aplicación de batería de riesgo psicosocial' => 
                                "Contamos con un equipo especializado en evaluar el riesgo intralaboral, extralaboral y el estrés al que se enfrenta el trabajador, a partir de los resulta dos se generan procedimientos para evitar patologías causadas por el estrés ocupacional.",
                            'Servicios de auditorias' => 
                                "La auditoría inicia con la definición y planificación del programa junto con el cronograma de interven ciones. una vez se realice la verificación del sg sst",
                            'Diseño del PESV' => 
                                "Te acompañamos en la creación del plan estratégico de seguridad vial",
                            'Exámenes médicos ocupacionales' => 
                                "Aplicación de exámenes de ingreso, periódicos o de egreso, además, se incluyen las pruebas complementarias como exámenes paraclinicos y pruebas de laboratorio"
                                



                        );
                        // <!--  -->
                    // $i = 1;
                    // foreach ($services_actives as $key => $value) {

                    // }

                    for ($i = 0; $i < 7; $i++) {
                        $hashone_service_page_id = get_theme_mod('hashone_service_page' . $i, $hashone_page);
                        $hashone_service_page_icon = get_theme_mod('hashone_service_page_icon' . $i, 'fa-globe');
                        
                        if ($hashone_service_page_id) {
                            $args = array('page_id' => $hashone_service_page_id);
                            $query = new WP_Query($args);
                            if ($query->have_posts()):
                                while ($query->have_posts()) : $query->the_post();
                                    $hashone_wow_delay = ($i * 200) + 300;
                                    ?>
                                    <div class="hs-clearfix hs-service-post hs-service-post<?php echo $i; ?> wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="<?php echo $hashone_wow_delay; ?>ms">
                                        <div class="hs-service-icon">
                                            <i class="fa <?php echo esc_attr($hashone_service_page_icon); ?>"></i>
                                        </div>

                                        <div class="hs-service-excerpt">
                                            <h6><a href="<?php the_permalink(); ?>"><?php the_title();//echo $key; ?></a></h6>
                                            <?php
                                                echo $value;
                                            if (has_excerpt()) {
                                                echo get_the_excerpt();
                                            } else {
                                                echo hashone_excerpt(get_the_content(), 100);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        }
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>




<!-- "Se define la ruta de evacuación y el punto de encuentro según el entorno de la empresa." -->