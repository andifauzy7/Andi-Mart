<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.checked {
		  color: orange;
		}
	</style>
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="col-12 mb-5 text-center"><h4>Silahkan Berikan penilaian anda</h4></div>

            <form class="col-12">
                <div id="rating_list" class="form-group text-center" data-rating="1">
                    <span class="rating fa fa-star" id="rate-1" data-index="1" style="cursor: pointer; font-size:60px;"></span>
                    <span class="rating fa fa-star" id="rate-2" data-index="2" style="cursor: pointer; font-size:60px;"></span>
                    <span class="rating fa fa-star" id="rate-3" data-index="3" style="cursor: pointer; font-size:60px;"></span>
                    <span class="rating fa fa-star" id="rate-4" data-index="4" style="cursor: pointer; font-size:60px;"></span>
                    <span class="rating fa fa-star" id="rate-5" data-index="5" style="cursor: pointer; font-size:60px;"></span>
                </div>
                <div class="form-group">
                    <label for="shout_text">Tulis Review</label>
                    <textarea class="form-control" id="review" rows="3"></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="button" id="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>

        </div> <!-- end content -->
    </div> <!-- end container -->

    <script type="text/javascript">
        $(document).ready(function(){
            load_data();

            function load_data(){
                var rating = $('#rating_list').data('rating');
                for(var count = 1; count <= rating; count++){
                    $('#rate-'+count).addClass("checked");
                    $('#rate-'+count).data('rating',rating);
                    console.log($('#rate-'+count).data('rating'));
                }
            }

            $(document).on('mouseenter', '.rating', function(){
                var index = $(this).data('index');
                remove_background();
                for(var count = 1; count <= index; count++){
                    $('#rate-'+count).addClass("checked");
                }
            });

            function remove_background(){
                for(var count = 1; count <= 5; count++){
                    $('#rate-'+count).removeClass("checked");
                }
            }

            $(document).on('click', '.rating', function(){
                var index = $(this).data('index');
                $('#rating_list').data('rating',index);
                load_data();
                
            });

            $(document).on('click', 'button#submit.btn', function(){
                var review = $('textarea#review').val();
                var rating = $('#rating_list').data('rating');
                $.ajax({
                    url: "<?=base_url('c_rating/add_rating');?>",
                    method: "POST",
                    data: {
                        review: review,
                        rating: rating,
                    },
                    success: function (data) {
                        alert("You have rate "+rating +" out of 5");
                        window.location.href = "<?php echo base_url(); ?>";
                    }
                });
            });

            $(document).on('mouseleave', '.rating', function(){
                var rating = $('#rating_list').data('rating');
                remove_background();
                for(var count = 1; count <= rating; count++){
                    $('#rate-'+count).addClass("checked");
                }
            });

        });
    </script>
</body>
</html>