							</div> <!-- close of main-content -->
						</div> <!-- close of col-sm-9 -->
					</div> <!-- close of row -->
				</div> <!-- close of main-wrapper -->
            </div> <!-- close of container -->
        </div> <!-- close of main-outer-wrapper -->

        <?php if (function_exists ( 'sat_fgms_modx_clone_get_section' )) {  echo sat_fgms_modx_clone_get_section('footer');  } ?>
        <?php wp_footer(); ?>
</div><!-- close outer-container -->
<?php if (function_exists ( 'sat_fgms_modx_clone_get_section' )) {  echo sat_fgms_modx_clone_get_section('map_footer_parallax');  } ?>

<!-- Sojern Tag v6_js, Pixel Version: 1 -->
<script>
  (function () {

    var params = {};

    /* Please do not modify the below code. */
    var cid = [];
    var paramsArr = [];
    var cidParams = [];
    var pl = document.createElement('script');
    var defaultParams = {"vid":"hot"};
    for(key in defaultParams) { params[key] = defaultParams[key]; };
    for(key in cidParams) { cid.push(params[cidParams[key]]); };
    params.cid = cid.join('|');
    for(key in params) { paramsArr.push(key + '=' + encodeURIComponent(params[key])) };
    pl.type = 'text/javascript';
    pl.async = true;
    pl.src = 'https://beacon.sojern.com/pixel/p/11584?f_v=v6_js&p_v=1&' + paramsArr.join('&');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(pl);
  })();
</script>
<!-- End Sojern Tag -->

<?php if (function_exists ( 'sat_fgms_modx_clone_get_section' )) {  echo sat_fgms_modx_clone_get_section('_js')       ;  } ?>

</body>
</html>
