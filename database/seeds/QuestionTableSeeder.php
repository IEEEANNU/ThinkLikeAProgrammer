<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class QuestionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('questions')->truncate();

        Question::insert(array(
            array("level_id"=>1,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#2iq6us","name"=>"Square","description"=>"simple square","hint_image"=>"","hint_text"=>"keep turning left and right","hint_penalty"=>0.2,"image"=>"q1.jpg"),
            array("level_id"=>1,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#64e79o","name"=>"Diamond","description"=>"Diamond","hint_image"=>"","hint_text"=>"There will be a total of six turns","hint_penalty"=>0.2,"image"=>"q2.jpg"),
            array("level_id"=>1,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#w6o5pg","name"=>"Circle","description"=>"Circle","hint_image"=>"","hint_text"=>"Click on ","hint_penalty"=>0.4,"image"=>"q3.jpg"),
            array("level_id"=>1,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#7w2yzk","name"=>"Tennis Ball","description"=>"Beautiful Tennis Ball","hint_image"=>"","hint_text"=>"in the circle draw 2 arcs, one by moving left & the other by moving right!","hint_penalty"=>0.2,"image"=>"q4.jpg"),
            array("level_id"=>1,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#9dptof","name"=>"Ninja Star 1","description"=>"Ninja Star","hint_image"=>"","hint_text"=>"draw 2 arcs one with moving right & another with moving left (70 degrees) -> repeat it six times","hint_penalty"=>0.4,"image"=>"q5.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#26tuzs","name"=>"Q-mark","description"=>"? mark","hint_image"=>"","hint_text"=>"draw small arc to the left & big arc to the right","hint_penalty"=>0.1,"image"=>"q6.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#58aivu","name"=>"I'm Smart","description"=>"Triangle with text","hint_image"=>"","hint_text"=>"use 'set width' and use 'print ","hint_penalty"=>0.2,"image"=>"q7.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#3bhru8","name"=>"Nested Circles","description"=>"Circles are Getting Smaller around a center point","hint_image"=>"","hint_text"=>"Decrease the radius from ","hint_penalty"=>0.2,"image"=>"q8.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#ybu8it","name"=>"Nested Circles","description"=>"Circles Getting Smaller around a center point with Color fading","hint_image"=>"","hint_text"=>"Use a loop from 100 to 0 with a step of 10","hint_penalty"=>0.2,"image"=>"q9.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#7xanrw","name"=>"Gears","description"=>"Gear Like","hint_image"=>"","hint_text"=>"in a loop of 9 times you have to loop 10 times","hint_penalty"=>0.2,"image"=>"q10.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#9dptof","name"=>"Rose","description"=>"Rose Like","hint_image"=>"","hint_text"=>"the length is ","hint_penalty"=>0.4,"image"=>"q11.jpg"),
            array("level_id"=>2,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#n9ovnw","name"=>"Polygons","description"=>"Square with something inside it","hint_image"=>"h12.jpg","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.4,"image"=>"q12.jpg"),
            array("level_id"=>3,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#38kfvv","name"=>"Stairs ","description"=>"Randomly Colored Stairs ","hint_image"=>"h13.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.4,"image"=>"q13.jpg"),
            array("level_id"=>3,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#64exog","name"=>"Waves","description"=>"Circles getting bigger in the 4 directions","hint_image"=>"","hint_text"=>"Use a loop from 1 to 100 by a step of 5, repeat this loop 4 times","hint_penalty"=>0.2,"image"=>"q14.jpg"),
            array("level_id"=>3,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#2t4p9d","name"=>"Multiple Circles","description"=>"Circles Getting bigger and bigger … etc","hint_image"=>"","hint_text"=>"60 degrees between each circle, 10 circles exist ","hint_penalty"=>0.2,"image"=>"q15.jpg"),
            array("level_id"=>3,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#4rq476","name"=>"Triangle-Circle ","description"=>"Tringle with a circle inside","hint_image"=>"h16.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.2,"image"=>"q16.jpg"),
            array("level_id"=>3,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#69w9b6","name"=>"Pyramid","description"=>"Tringles Getting Thinner and Taller","hint_image"=>"","hint_text"=>"in a loop reduce base length by suitable value each time","hint_penalty"=>0.2,"image"=>"q17.jpg"),
            array("level_id"=>4,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#2g6rnu","name"=>"Cloudy","description"=>"Clouds ","hint_image"=>"","hint_text"=>"Draw arcs with different radiuses and angles, no loops at all.","hint_penalty"=>0.1,"image"=>"q18.jpg"),
            array("level_id"=>4,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#39eo5x","name"=>"Decoration","description"=>"Arcs forming a circle while using Tringles ","hint_image"=>"h19.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.4,"image"=>"q19.jpg"),
            array("level_id"=>4,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#5xrz5w","name"=>"Ninja Star'","description"=>"Ninja Star X-times","hint_image"=>"h20.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.3,"image"=>"q20.jpg"),
            array("level_id"=>4,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#2d2n9m","name"=>"Rose Petal","description"=>"your answer won't be accepted but if the tappered angle is dynamic and the shape remains balanced whenever  the length is changed  - ask for help!","hint_image"=>"h21.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.4,"image"=>"q21.jpg"),
            array("level_id"=>5,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#vsgqiw","name"=>"Gears","description"=>"A stupid Polygon","hint_image"=>"h22.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.4,"image"=>"q22.jpg"),
            array("level_id"=>5,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#7wz8yq","name"=>"Ballon","description"=>"A beautiful Ballon - you will like it :)","hint_image"=>"","hint_text"=>"set color to blend (white to orange) with a ratio of (length / 50 )","hint_penalty"=>0.2,"image"=>"q23.jpg"),
            array("level_id"=>5,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#6y694x","name"=>"Rose","description"=>"Flower with Color Fade, it's beautiful ","hint_image"=>"h24.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.2,"image"=>"q24.jpg"),
            array("level_id"=>5,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#67eu5a","name"=>"Star","description"=>"Diamonds forming a star and going smaller  and Other Functions","hint_image"=>"h25.png","hint_text"=>"This piece of code might be useful:","hint_penalty"=>0.2,"image"=>"q25.jpg"),
            array("level_id"=>5,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#63jckw","name"=>"Vortex","description"=>"Some Hard Shape Rotating","hint_image"=>"h26.png","hint_text"=>"Repeat this.","hint_penalty"=>0.2,"image"=>"q26.jpg"),
            array("level_id"=>5,"link"=>"https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html#77dtgy","name"=>"Circles","description"=>"Circles, Circles everywhere!!!!","hint_image"=>"","hint_text"=>"Help Yourself by yourself :P we will give you 5 additional points if you solved this, go on!","hint_penalty"=>0.2,"image"=>"q27.jpg"),
            array("level_id"=>6,"link"=>"https://translate.google.com/#en/ar/This%20Question%20is%20Optional","name"=>"Think Like A Programmer","description"=>"This Question Is OPTIONAL ","hint_image"=>"","hint_text"=>"","hint_penalty"=>null,"image"=>"q28.jpg")
        ));
    }

}
