<?php


function wollow_submenu()
{
    $html = '
        <link rel="stylesheet" href="' . site_url() . '/wp-content/plugins/wollow/assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <style>

            #exTab1 .tab-content {
                color: white;
                background-color: #428bca;
                padding: 5px 15px;
            }

            #exTab2 h3 {
                color: black;
                // background-color: #428bca;
                padding: 5px 15px;
            }

            /* remove border radius for the tab */

            #exTab1 .nav-pills>li>a {
                border-radius: 0;
            }

            #exTab3 .nav-pills>li>a {
                border-radius: 4px 4px 0 0;
            }

            #exTab3 .tab-content {
                color: white;
                background-color: #428bca;
                padding: 5px 15px;
            }
            .wp-person a:focus .gravatar, a:focus, a:focus .media-icon img {
                color: #124964;
                box-shadow: none;
                outline: 1px solid transparent;
            }
            .mt-5{
                margin-top: 30px;
            }
        </style>

        <div class="container">
            <h2>Pengaturan Wollow</h2>
        </div>
        
        <div id="exTab2" class="container">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#1" data-toggle="tab">Satu</a>
                </li>
                <li>
                    <a href="#2" data-toggle="tab">Dua</a>
                </li>
                <li>
                    <a href="#3" data-toggle="tab">Tiga</a>
                </li>
                <li>
                    <a href="#4" data-toggle="tab">Empat</a>
                </li>
                <li>
                    <a href="#5" data-toggle="tab">Lima</a>
                </li>
                <li>
                    <a href="#6" data-toggle="tab">Enam</a>
                </li>
                <li>
                    <a href="#7" data-toggle="tab">Tujuh</a>
                </li>
            </ul>
        
            <div class="tab-content ">
                <div class="tab-pane active" id="1">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Satu">
                        <textarea id="summernote-1" name="wollowSatu"> '.get_option( "wollow_Satu").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Satu</button>
                    </form>
                </div>
                <div class="tab-pane" id="2">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Dua">
                        <textarea id="summernote-2" name="wollowDua"> '.get_option( "wollow_Dua").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Dua</button>
                    </form>
                </div>
                <div class="tab-pane" id="3">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Tiga">
                        <textarea id="summernote-3" name="wollowTiga"> '.get_option( "wollow_Tiga").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Tiga</button>
                    </form>
                </div>
                <div class="tab-pane" id="4">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Empat">
                        <textarea id="summernote-4" name="wollowEmpat"> '.get_option( "wollow_Empat").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Empat</button>
                    </form>
                </div>
                <div class="tab-pane" id="5">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Lima">
                        <textarea id="summernote-5" name="wollowLima"> '.get_option( "wollow_Lima").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Lima</button>
                    </form>
                </div>
                <div class="tab-pane" id="6">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Enam">
                        <textarea id="summernote-6" name="wollowEnam"> '.get_option( "wollow_Enam").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Enam</button>
                    </form>
                </div>
                <div class="tab-pane" id="7">
                    <form method="POST">
                        <input type="hidden" name="wollow" value="Tujuh">
                        <textarea id="summernote-7" name="wollowTujuh"> '.get_option( "wollow_Tujuh").' </textarea>
                        <button type="submit" class="btn btn-primary">submit Tujuh</button>
                    </form>
                </div>
            </div>

            <h4 class="mt-5">Shortcode</h4>
            <div>%site_name% : Nama situs</div>
            <div>%order_id% : ID pesanan</div>
            <div>%customer_name% : Nama customer</div>
            <div>%order_date% : Tanggal pesanan</div>
            <div>%customer_email% : Email customer</div>
            <div>%order_details% : Detail pesanan</div>
            <div>%billing_total% : Total biaya</div>
        </div>
    ';
    $script = '
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote-1").summernote({
                placeholder: "Ketik konten wollow Satu",
                tabsize: 2,
                height: 200
            });
            $("#summernote-2").summernote({
                placeholder: "Ketik konten wollow Dua",
                tabsize: 2,
                height: 200
            });
            $("#summernote-3").summernote({
                placeholder: "Ketik konten wollow Tiga",
                tabsize: 2,
                height: 200
            });
            $("#summernote-4").summernote({
                placeholder: "Ketik konten wollow Empat",
                tabsize: 2,
                height: 200
            });
            $("#summernote-5").summernote({
                placeholder: "Ketik konten wollow Lima",
                tabsize: 2,
                height: 200
            });
            $("#summernote-6").summernote({
                placeholder: "Ketik konten wollow Enam",
                tabsize: 2,
                height: 200
            });
            $("#summernote-7").summernote({
                placeholder: "Ketik konten wollow Tujuh",
                tabsize: 2,
                height: 200
            });
        });
    </script>
    ';

    echo $html . $script;
}
