@extends('public.layout.layout')
@section('content')
    <style>
        .hover {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            background-blend-mode: multiply,luminosity;
            background-repeat: no-repeat;
        }
        .textCat {
            color: white;
            text-shadow: 3px 3px 10px #333;
        }
        .textCat:hover {

            transition: all 0.8s ease;
        }
        .hover:hover{
            visibility: visible;
            box-shadow: 3px 3px 20px #adb5bd;
            background: #F7941E;
            transition: all 0.8s ease;
            opacity: 0.8;

        }
    </style>
{{--    <div class="container-fluid" style="overflow: hidden">--}}
{{--        <div--}}
{{--            style="height: 76.5vh; background-image: url('https://wallpapercave.com/wp/wp2122158.jpg'); background-repeat: no-repeat  ;"--}}
{{--            class="row">--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200vh" width="200vw"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center"--}}
            {{--                 onMouseOver="this.style.background-color='orange'" onMouseOut="this.style.background-color='grey'">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200" width="200"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center;"--}}
            {{--                 onMouseOver="this.style.background-color='orange'" onMouseOut="this.style.background-color='grey'">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200" width="200"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center"--}}
            {{--                 onMouseOver="this.style.background-color='orange'" onMouseOut="this.style.background-color='grey'">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200" width="200"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}


{{--        </div>--}}
{{--    </div>--}}
{{--    <div style="height: 76.5vh" class="container-fluid">--}}
{{--        <div class="row justify-content-center align-items-center">--}}


{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center; padding: 10%">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; width: 50%; height: 50%; border-radius: 50%;  font-size: 2rem; font-weight: bold">Questions</a>--}}
{{--            </div>--}}
{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; padding: 12%; font-size: 2rem; font-weight: bold">Shop</a>--}}
{{--            </div>--}}



{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; padding: 12%; font-size: 2rem; font-weight: bold">Rescue</a>--}}
{{--            </div>--}}
{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; padding: 12%; font-size: 2rem; font-weight: bold">Adoption</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="container-fluid">
    <div class="row" style="height: 70vh">
        <div class="col-3 hover" style="background-image: url('https://www.catbreedslist.com/cat-wallpapers/Persian-kitten-grass-white-720x1280.jpg')"><a href="/posts/question"><h2 class="textCat">Question</h2></a></div>
        <div class="col-3 hover" style="background-image: url('https://i.pinimg.com/564x/66/9e/73/669e7309a17bd838c00fefbff60ae8d4.jpg')"><a href="/shop"><h2 class="textCat">Shop</h2></a></div>
        <div class="col-3 hover" style="background-image: url('https://i.pinimg.com/564x/f3/4d/0b/f34d0bd59329c6e53b1322c0a7f7a9ef.jpg')"><a href="/posts/rescue"><h2 class="textCat">Rescue</h2></a></div>
        <div class="col-3 hover" style="background-image: url('https://i.pinimg.com/originals/a8/51/2f/a8512f9da9c8608ac7d7599574eb52fb.jpg')"><a href="/posts/adopte"><h2 class="textCat">Adoption</h2></a></div>
    </div>
</div>
@endsection
