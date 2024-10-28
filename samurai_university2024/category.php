<?php get_header(); ?>
    <!-- Home -->

    <div class="home">
      <div class="breadcrumbs_container">
        <div class="image_header">
          <div class="header_info">
          <?php
               $cat = get_the_category();
               $catslug = $cat[0]->slug;
               $catname = $cat[0]->cat_name;
             ?>
             <div><?php echo $catslug; ?></div>
             <div><?php echo $catname; ?></div>          
            </div>
        </div>
      </div>
    </div>

    <!-- Course -->

    <div class="course">
      <div class="row content-body">
        <!-- Course -->
        <div class="col-lg-8">
          <!-- Course Tabs -->
          <div class="course_tabs_container">
            <div class="tab_panels">
              <!-- Description -->
              <div class="tab_panel">
              <div class="tab_panel_title"><?php echo $catname; ?></div>                <div class="tab_panel_content">
                  <div class="tab_panel_text">
                    <!-- news loop from here-->
                    <?php if (have_posts()) : ?>
                       <?php while(have_posts()) : the_post(); ?>
                       <div class="news_posts_small">
                       <div class="row">
                         <div class="col-lg-2 col-md-2 col-sx-12">
                           <div class="calendar_news_border">
                             <div class="calendar_news_border_1">
                               <div class="calendar_month">
                               <?php 
                                   if( is_category('event') ) :
                                     echo post_custom('month');
                                   else:
                                     echo get_post_time('F');
                                   endif;
                                 ?>                              
                                 </div>
                               <div class="calendar_day">
                                 <span>
                                 <?php 
                                   if( is_category('event') ) :
                                     echo post_custom('day');
                                   else:
                                     echo get_the_date('d');
                                   endif;
                                   ?>                                 
                                   </span>
                               </div>
                             </div>
                           </div>
                           <?php
                           if (is_category('event')) :
                           ?>
                             <div class="calendar_hour"><?php echo post_custom('time'); ?></div>
                           <?php
                           endif;
                           ?>
                         </div>
                         <div class="col-lg-10 col-md-10 col-sx-12">
                           <div class="news_post_small_title">
                             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           </div>
                           <div class="news_post_meta">
                             <ul>
                               <li>
                                 <?php echo wp_trim_words( get_the_content() , 100, '...'); ?>
                               </li>
                             </ul>
                           </div>
                           <div class="read_continue">
                           <button><a href="<?php the_permalink(); ?>" class="text-white">詳細を見る</a></button>
                           </div>
                         </div>
                       </div>
                       <hr />
                     </div>
                     <?php endwhile; ?>
                     <?php endif; ?>
                     <!-- news loop until here-->
                     <div class="news-pagination">
                       <?php
                         // 記事一覧ページ用のページネーション
                         echo paginate_links(array(
                           'total' => $wp_query->max_num_pages,
                           'prev_text' => '&lt;&lt;前へ',
                           'next_text' => '次へ&gt;&gt;',
                         ));
                       ?>
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4" style="background-color: #2b7b8e33">
        <?php get_sidebar()?>
        </div>
      </div>
    </div>

                <div class="footer_section footer_links">
                  <div class="footer_links_container">
                    <ul>
                      <li><a href="news.html">ニュース</a></li>
                      <li><a href="events.html">イベント</a></li>
                      <li><a href="courses.html">コース</a></li>
                      <li><a href="about_us.html">侍大学について</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 footer_col clearfix">
                ※ここにTwitterのタイムラインを埋め込みます
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row copyright_row">
        <div class="col">
          <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
            <div class="cr_text">
              Copyright &copy; Samurai University All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!--jQuery-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="styles/bootstrap4/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(".carousel").carousel();
  </script>

</body>

<?php get_footer( ); ?>