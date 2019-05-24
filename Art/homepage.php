<?php
session_start();
include_once 'includes/connector.php';
if(!isset($_SESSION['cusid'])){
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
}
$id = $_SESSION['cusid'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$sql = "Select path from artwork where views > 3";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html style="margin-top:-230px;" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="homepage/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="homepage/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="homepage/css/-Filterable-Cards-.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="homepage/css/News-Cards.css">
    <link rel="stylesheet" href="homepage/css/Team-with-rotating-cards.css">
</head>

<body style="background-color: rgba(166,140,145,0.30);">
<?php
require_once 'navbar.php';
?>
<section id="top-art-worl" class="clean-block slider dark">
    <div class="container">
        <div data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox"  style="height:570px;margin-top:270px;">
                <h2 align="center">Top Rated Artwork</h2>
                <?php
                $i= 0;
                while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="carousel-item active">
                        <img class="w-100 d-block" src="<?php echo $data['path'];?>" alt="Slide Image">
                    </div>
            </div>
            <div>
                <a href="#carousel-1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span>
                </a>
                <a  href="#carousel-1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br>
        <?php
        }?>
    </div>
</section>
<section id="legendary-artist" class="card-section-imagia" style="margin-top:-100px;">
    <h1 style="margin-bottom:20px;">Legendary Artists</h1>
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-sm-6 col-md-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card-container-imagia">
                    <div class="card-imagia">
                        <div class="front-imagia">
                            <div class="user-imagia" style="margin-top:10px; height:180px; width: 180px;"><img src="homepage/img/1.jpg" class="img-circle" alt=""></div>
                            <div class="content-imagia" style="margin-top:0px;">
                                <h3 class="name-imagia">Leonardo da Vinci</h3>
                                <p class="subtitle-imagia" style="margin-bottom:0;">Art and Science</p>
                                <p class="text-center" style="color:rgb(0,0,0);"><strong>Leonardo da Vinci</strong> was an <strong>Italian</strong>&nbsp;
                                    polymath of the <strong>Renaissance</strong>&nbsp;whose areas of interest included invention, painting, sculpting, architecture,
                                    science, music, engineering, literature, astronomy, writing, history, and cartography.
                                </p>
                            </div>
                        </div>
                        <div class="back-imagia">
                            <div class="content-imagia content-back-imagia">
                                <div><br>
                                    <h5 class="text-center" style="margin-bottom:0px; margin-left: 70px">Works<br><br></h5>
                                    <p class="text-center" style="margin-left: 70px;">
                                        <a href="https://en.wikipedia.org/wiki/Mona_Lisa"><em>Mona Lisa</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/The_Last_Supper_(Leonardo_da_Vinci)"><em>The Last Supper</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/Salvator_Mundi_(Leonardo)"><em>Salvator Mundi</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/Vitruvian_Man"><em>The Vitruvian Man</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/Lady_with_an_Ermine"><em>Lady with an Ermine</em></a><br>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card-container-imagia">
                    <div class="card-imagia">
                        <div class="front-imagia">
                            <div class="user-imagia" style="margin-top:10px; height: 180px; width: 180px;"><img src="homepage/img/2.jpg" class="img-circle" alt=""></div>
                            <div class="content-imagia" style="margin-top:0px;">
                                <h3 class="name-imagia">Johannes Vermeer</h3>
                                <p class="subtitle-imagia" style="margin-bottom: 0px">Art and Light</p>
                                <p class="text-center"><strong>Johannes Vermeer</strong> was a <strong>Dutch</strong> painter&nbsp;who specialized in
                                    domestic interior scenes of <strong>middle-class</strong> life.Vermeer worked frequently with very expensive
                                    <strong>pigments</strong>. He is particularly renowned for his masterly treatment and use of light in his work.
                                </p>
                            </div>
                        </div>
                        <div class="back-imagia">
                            <div class="content-imagia content-back-imagia">
                                <div><br>
                                    <h5 class="text-center" style="margin-bottom:0px; margin-left: 50px">Works<br><br></h5>
                                    <p class="text-center" style="margin-left: 50px;">
                                        <a href="https://www.google.com.pk/search?q=The+Art+of+Painting&amp;stick=H4sIAAAAAAAAAONgFuLQz9U3SCo3qlDiBLEs0tOMs7X4HYtKMotLQvKBdHl-UTYAL4EnACgAAAA&amp;sa=X&amp;ved=2ahUKEwjqtcLJ9IbfAhWbQRUIHVHkAjEQxA0wLXoECAgQCQ">The Art of Painting</a><br>
                                        <a href="https://www.google.com.pk/search?q=Girl+with+a+Pearl+Earring&amp;stick=H4sIAAAAAAAAAONgFuLQz9U3SCo3qlDiBLHS0gtK4rX4HYtKMotLQvKBdHl-UTYAlPaysygAAAA&amp;sa=X&amp;ved=2ahUKEwjqtcLJ9IbfAhWbQRUIHVHkAjEQxA0wLXoECAgQBQ">Girl with a Pearl Earring</a><br>
                                        <a href="https://www.google.com.pk/search?q=Woman+in+Blue+Reading+a+Letter&amp;stick=H4sIAAAAAAAAAONgFuLQz9U3SCo3qlDiBLEsyowszbX4HYtKMotLQvKBdHl-UTYAMb4IuigAAAA&amp;sa=X&amp;ved=2ahUKEwjqtcLJ9IbfAhWbQRUIHVHkAjEQxA0wLXoECAgQDQ">Woman in Blue Reading...</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Diana+and+Her+Companions&stick=H4sIAAAAAAAAAONgFuLQz9U3SCo3qlDiArHS09LTjA20lLKTrfTLMotLE3PiE4tKkJiZxSVW5flF2cUAeOBqgDwAAAA&npsic=-2633&ved=0ahUKEwjN3_2y86HfAhUBsXEKHQLGAbwQ-BYIdA&cshid=1544879297410000">Diana And Her Companions</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=A+Lady+Playing+the+Guitar&stick=H4sIAAAAAAAAAONgFuLQz9U3SCo3qlDi1U_XNzRMqayoyrY0NNFSyk620i_LLC5NzIlPLCpBYmYWl1iV5xdlFwMA4iyVSj8AAAA&npsic=-3941&ved=0ahUKEwjN3_2y86HfAhUBsXEKHQLGAbwQ-BYImwE&cshid=1544879297410000">A lady Playing The Guitar</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&q=The+Music+Lesson&stick=H4sIAAAAAAAAAONgFuLQz9U3SCo3qlDiArGMzCsq03K1-B2LSjKLS0LygXR5flE2ANUih2kpAAAA&npsic=-1152&ved=0ahUKEwiTkMGt9aHfAhXhRxUIHboxAsQQ-BYISg">The Music Lesson</a><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4" data-aos="fade-right" data-aos-delay="200">
                <div class="card-container-imagia">
                    <div class="card-imagia">
                        <div class="front-imagia">
                            <div class="user-imagia" style="margin-top:10px; height: 180px; width: 180px;"><img src="homepage/img/3.jpg" class="img-circle" alt=""></div>
                            <div class="content-imagia" style="margin-top:0px;">
                                <h3 class="name-imagia">René Magritte</h3>
                                <p class="subtitle-imagia"  style="margin-bottom: 0px">Self Portrait</p>
                                <p class="text-center"><strong>René Magritte</strong> was a <strong>Belgian</strong> <strong>surrealist</strong> artist.
                                    He became well known for creating a number of <strong>witty</strong> and <strong>thought-provoking</strong> images.
                                    His work is known for challenging observers' preconditioned perceptions of reality.
                                </p>

                            </div>
                        </div>
                        <div class="back-imagia">
                            <div class="content-imagia content-back-imagia">
                                <div>
                                    <h5 class="text-left" style="margin-bottom:0px; margin-left: 120px;">Works<br><br></h5>
                                    <p class="text-center" style="margin-left: 60px;">
                                        <a href="https://en.wikipedia.org/wiki/The_Son_of_Man"><em>The Son of Man</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/The_Human_Condition_(painting)"><em>The Human Condition</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/The_Menaced_Assassin"><em>The Menaced Assassin</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/The_Treachery_of_Images">The Treachery of Images</a><br>
                                        <a href="https://en.wikipedia.org/wiki/Elective_Affinities_(Magritte)">Elective Affinities</a><br>
                                        <a href="https://www.google.com.pk/search?q=The+Meaning+of+Night+(painting)&oq=the+meaning+of+Night&aqs=chrome.0.69i59j69i57j69i60.5298j0j7&sourceid=chrome&ie=UTF-8">The Meaning of Night</a><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-down" data-aos-delay="200">
            <div class="col-sm-6 col-md-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card-container-imagia">
                    <div class="card-imagia">
                        <div class="front-imagia">
                            <div class="user-imagia" style="margin-top:10px;  height: 180px; width: 180px;"><img src="homepage/img/4.jpg" class="img-circle" alt=""></div>
                            <div class="content-imagia" style="margin-top: 0px">
                                <h3 class="name-imagia">Georgia O'Keeffe</h3>
                                <p class="subtitle-imagia" style="margin-bottom: 0px">Art and Flowers</p>
                                <p class="text-center"><strong>Georgia O'Keeffe</strong> was an American artist. She was best known for
                                    her paintings of <strong>enlarged flowers</strong>, <strong>New York skyscrapers</strong>,
                                    and&nbsp;<strong>New Mexico</strong>&nbsp;landscapes. O'Keeffe has been recognized as the "Mother of&nbsp;
                                    <strong>American modernism</strong>".
                                </p>
                            </div>
                        </div>
                        <div class="back-imagia">
                            <div class="content-imagia content-back-imagia">
                                <div><br><br>
                                    <h5 class="text-center" style="margin-bottom:0px; margin-left: 40px;">Works<br><br></h5>
                                    <p class="text-center" style="margin-left: 40px;">
                                        <a href="https://www.google.com.pk/search?q=Jimson+Weed+(painting)&amp;stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4gIx81IyCk3Ltfgdi0oyi0tC8oF0eX5RNgAHiwdJKgAAAA&amp;sa=X&amp;ved=2ahUKEwij-Z75-4bfAhUQSxUIHZZVDOAQxA0wI3oECAgQBQ">Jimson Weed</a><br>
                                        <a href="https://www.google.com.pk/search?q=Black+Iris+(painting)&amp;stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4tFP1zc0NKpMy7EwKdHidywqySwuCckH0uX5RdkAhn9SRywAAAA&amp;sa=X&amp;ved=2ahUKEwij-Z75-4bfAhUQSxUIHZZVDOAQxA0wI3oECAgQBw">Black Iris</a><br>
                                        <a href="https://www.google.com.pk/search?q=Sky+Above+Clouds+IV&amp;stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4gIxjQuTTA2LtPgdi0oyi0tC8oF0eX5RNgDajuaDKgAAAA&amp;sa=X&amp;ved=2ahUKEwij-Z75-4bfAhUQSxUIHZZVDOAQxA0wI3oECAgQCw">Sky Above Clouds IV</a><br>
                                        <a href="https://www.google.com.pk/search?q=Lake+George+%5Bformerly+Reflection+Seascape%5D&amp;stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4gIxjQvNDTIMtfgdi0oyi0tC8oF0eX5RNgAAYUhKKgAAAA&amp;sa=X&amp;ved=2ahUKEwij-Z75-4bfAhUQSxUIHZZVDOAQxA0wI3oECAgQDQ">Lake George [formerly...</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Radiator+Building&stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4tVP1zc0TM4uyUiujK_UUspOttIvyywuTcyJTywqQWJmFpdYlecXZRcDAHwVORBAAAAA&npsic=0&ved=0ahUKEwjG5cyczaPfAhVNrxoKHRTmAFoQ-BYIPg&tbs=kac:1,kac_so:0">Radiater Building</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Light+Coming+on+the+Plains&stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4tVP1zc0TDYzrzArLM_WUspOttIvyywuTcyJTywqQWJmFpdYlecXZRcDAJflu8xAAAAA&npsic=-2304&ved=0ahUKEwiHhqnqzKPfAhVsx4UKHSL_AvwQ-BYIdw">Light Coming on the Plains</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=City+Night&stick=H4sIAAAAAAAAAONgFuLUz9U3MCyxMDBX4tVP1zc0TDYuSS-PL87VUspOttIvyywuTcyJTywqQWJmFpdYlecXZRcDAByZsZ1AAAAA&npsic=-4992&ved=0ahUKEwiHhqnqzKPfAhVsx4UKHSL_AvwQ-BYIvAE">City Night</a><br>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card-container-imagia">
                    <div class="card-imagia">
                        <div class="front-imagia">
                            <div class="user-imagia" style="margin-top:10px;  height: 180px; width: 180px;"><img src="homepage/img/5.jpg" class="img-circle" alt=""></div>
                            <div class="content-imagia" style="margin-top: 0px;">
                                <h3 class="name-imagia">Frida Kahlo</h3>
                                <p class="subtitle-imagia" style="margin-bottom: 0px;">Art and Pain</p>
                                <p class="text-center"><strong>Frida Kahlo</strong> was a <strong>Mexican artist</strong>&nbsp;who's works inspired by the nature
                                    and <strong>artifacts</strong> of Mexico. Inspired by the country's popular culture, she employed a style to explore questions of identity, gender,
                                    class and race in Mexican society.
                                </p>
                            </div>
                        </div>
                        <div class="back-imagia">
                            <div class="content-imagia content-back-imagia">
                                <div><br>
                                    <h5 class="text-center" style="margin-bottom:0px; margin-left: 10px;">Works<br><br></h5>
                                    <p class="text-center" style="margin-left: 30px;">
                                        <a href="https://en.wikipedia.org/wiki/Memory,_the_Heart"><em>Memory, the Heart</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/The_Two_Fridas"><em>The Two Fridas</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/What_the_Water_Gave_Me_(painting)"><em>What the Water Gave Me</em></a><br>
                                        <a href="https://en.wikipedia.org/wiki/Self-Portrait_with_Thorn_Necklace_and_Hummingbird"><em>Self-Portrait with Thorn Necklace</em></a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Without+Hope&stick=H4sIAAAAAAAAAONgFuLUz9U3MDTNNjBR4gYzDdMsjA3ytJSyk630yzKLSxNz4hOLSpCYmcUlVuX5RdnFAMytEeE-AAAA&npsic=-512&ved=0ahUKEwiLt-KE0qPfAhUNUhUIHW7FCXsQ-BYIRA">Without Hope</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=The+Wounded+Table&stick=H4sIAAAAAAAAAONgFuLUz9U3MDTNNjBR4gYzjarKjM0stJSyk630yzKLSxNz4hOLSpCYmcUlVuX5RdnFAD55xew-AAAA&npsic=-1664&tbs=kac:1,kac_so:0&ved=0ahUKEwiEk6ig0qPfAhVVtHEKHZD0CvYQ-BYIaA">The Wounded Table</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Memory,+the+Heart&stick=H4sIAAAAAAAAAONgFuLUz9U3MDTNNjBR4gYzDdMsDHONtZSyk630yzKLSxNz4hOLSpCYmcUlVuX5RdnFAG2wCRA-AAAA&npsic=-3968&tbs=kac:1,kac_so:0&ved=0ahUKEwiwvsbC0qPfAhWConEKHcX4AYgQ-BYIlQE">Memory, the Heart</a><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4" data-aos="fade-right" data-aos-delay="200">
                <div class="card-container-imagia">
                    <div class="card-imagia">
                        <div class="front-imagia">
                            <div class="user-imagia" style="margin-top:10px; height: 180px; width: 180px;"><img src="homepage/img/6.jpg" class="img-circle" alt=""></div>
                            <div class="content-imagia" style="margin-top: 0px;">
                                <h3 class="name-imagia">Pablo Picasso</h3>
                                <p class="subtitle-imagia" style="margin-bottom: 0px;">Art and Cubist</p>
                                <p class="text-center"><strong>Pablo Picasso</strong> as a Spanish painter, sculptor, printmaker,&nbsp;ceramicist,
                                    stage designer, poet and playwright. He is known for co-founding the&nbsp;<strong>Cubist</strong>&nbsp;movement,
                                    the invention of&nbsp;constructed sculpture, the co-invention of&nbsp;collage.
                                </p>
                            </div>
                        </div>
                        <div class="back-imagia">
                            <div class="content-imagia content-back-imagia">
                                <div><br>
                                    <h5 class="text-center" style="margin-bottom:0px; margin-left: 50px;">Works<br><br></h5>
                                    <p class="text-center" style="margin-left: 50px;">
                                        <a href="https://www.google.com.pk/search?sa=X&amp;biw=1366&amp;bih=626&amp;q=Chicago+Picasso&amp;stick=H4sIAAAAAAAAAONgFuLQz9U3MDOIN1fiBLEsLLMNirX4HYtKMotLQvKBdHl-UTYArMCGWCgAAAA&amp;ved=2ahUKEwic45nd_4bfAhWbThUIHaJhCgIQxA0wJXoECAkQCQ">The Picasso</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&amp;biw=1366&amp;bih=626&amp;q=The+Old+Guitarist&amp;stick=H4sIAAAAAAAAAONgFuLQz9U3MDOIN1fiBLEsTM0KC7X4HYtKMotLQvKBdHl-UTYADMfckygAAAA&amp;ved=2ahUKEwic45nd_4bfAhWbThUIHaJhCgIQxA0wJXoECAkQCw">The Old Guitarist</a><br>
                                        <a href="https://en.wikipedia.org/wiki/Girl_before_a_Mirror"><em>Girl before a Mirror</em></a><br><a href="https://www.google.com.pk/search?sa=X&amp;biw=1366&amp;bih=626&amp;q=The+Weeping+Woman&amp;stick=H4sIAAAAAAAAAONgFuLQz9U3MDOIN1fiArGMLCyqzJK1-B2LSjKLS0LygXR5flE2AM58S2gpAAAA&amp;ved=2ahUKEwic45nd_4bfAhWbThUIHaJhCgIQxA0wJXoECAkQDQ">The Weeping Woman</a>&nbsp<br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Child+with+a+Dove&stick=H4sIAAAAAAAAAONgFuLQz9U3MDOIN1fiArFKTI3ic4u0lLKTrfTLMotLE3PiE4tKkJiZxSVW5flF2cUA9NEfBDwAAAA&npsic=-2304&ved=0ahUKEwjm2JXa1KPfAhXdURUIHcpIDPUQ-BYIaw">Child with a Dove</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=The+Blue+Room+(Picasso)&stick=H4sIAAAAAAAAAONgFuLQz9U3MDOIN1fiArGMy3MrUoy1lLKTrfTLMotLE3PiE4tKkJiZxSVW5flF2cUApluOjzwAAAA&npsic=-5120&ved=0ahUKEwjm2JXa1KPfAhXdURUIHcpIDPUQ-BYIsAE">The Blue Room</a><br>
                                        <a href="https://www.google.com.pk/search?sa=X&biw=1366&bih=626&q=Woman+in+a+Red+Armchair&stick=H4sIAAAAAAAAAONgFuLQz9U3MDOIN1fiArHykgyzUyy0lLKTrfTLMotLE3PiE4tKkJiZxSVW5flF2cUAujttaDwAAAA&npsic=-5221&ved=0ahUKEwjm2JXa1KPfAhXdURUIHcpIDPUQ-BYIqgE">Woman in a Red Armchair</a><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="about-us" class="page-footer dark" style="margin-bottom:-235px; color:black;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Get started</h5>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                    <li><a href="#">Downloads</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>About us</h5>
                <ul>
                    <li><a href="#">Company Information</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Support</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Help desk</a></li>
                    <li><a href="#">Forums</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Legal</h5>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2018 Copyright Text</p>
    </div>
</footer>
<script src="homepage/js/jquery.min.js"></script>
<script src="homepage/bootstrap/js/bootstrap.min.js"></script>
<script src="homepage/js/theme.js"></script>
<script src="homepage/js/-Filterable-Cards-.js"></script>
<script src="homepage/js/bs-animation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>