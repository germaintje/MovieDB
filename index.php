<?php include "connectDatabase.php";

function queryOne($conn) {
    $sql = "SELECT mov_title,mov_year FROM movie";
    $result = $conn->query($sql);
    ?><h3>one</h3><?php
    while($data = $result->fetch_assoc()) {
        $resultData= '';

        $resultData.= $data['mov_year'] . " " . $data['mov_title'] . "<br>";

        echo $resultData;
    }
}

//queryTwo($conn);

function queryTwo($conn) {
    $sql = "SELECT mov_year FROM movie WHERE mov_title = 'American Beauty'";
    $result = $conn->query($sql);
    ?><h3>two</h3><?php
    while($data = $result->fetch_assoc()) {
        echo $data['mov_year'];
    }
}

//queryThree($conn);

function queryThree($conn) {
    $sql = "SELECT mov_title FROM movie WHERE mov_year = 1999";
    $result = $conn->query($sql);
    ?><h3>three</h3><?php
    while($data = $result->fetch_assoc()) {
        echo $data['mov_title'] . "<br>";
    }
}

//queryFour($conn);

function queryFour($conn) {
    $sql = "SELECT mov_title FROM movie WHERE mov_year < 1998";
    $result = $conn->query($sql);
    ?><h3>four</h3><?php
    while($data = $result->fetch_assoc()) {
        echo $data['mov_title'] . "<br>";
    }
}

//queryFive($conn);

function queryFive($conn) {
    $sql = "SELECT reviewer.rev_name, movie.mov_title FROM reviewer, rating, movie WHERE movie.mov_id = rating.mov_id AND reviewer.rev_id = rating.rev_id";
    $result = $conn->query($sql);
    ?><h3>five</h3><?php
    while($data = $result->fetch_assoc()) {
    }
}

//querySix($conn);

function querySix($conn) {
    $sql = "SELECT reviewer.rev_name  FROM reviewer, rating WHERE rating.rev_id = reviewer.rev_id AND rating.rev_stars >= 7 AND reviewer.rev_name IS NOT NULL";
    $result = $conn->query($sql);
    ?><h3>six</h3><?php
    while($data = $result->fetch_assoc()) {
        ?>
    <table>
        <tr>
            <td><?php echo $data['rev_name']; ?></td>
        </tr>
    </table>
    <?php
    }
}
/*
function querySix($conn) {
    $sql = "SELECT rev_name FROM reviewer NATURAL JOIN rating WHERE rev_stars >= 7 AND rev_name IS NOT NULL";
    $result = $conn->query($sql);

    while($data = $result->fetch_assoc()) {
        ?>
    <table>
        <tr>
            <td><?php echo $data['rev_name']; ?></td>
        </tr>
    </table>
    <?php
    }
}*/

//querySeven($conn);

function querySeven($conn) {
    $sql = "SELECT mov_title FROM movie WHERE mov_id NOT IN(SELECT mov_id FROM rating Where mov_id IS NOT NULL)";
    $result = $conn->query($sql);
        ?><h3>seven</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['mov_title']; ?></td>
            </tr>
        </table>
        <?php
    }
}

//queryEight($conn);

function queryEight($conn) {
    $sql = "SELECT mov_title FROM movie WHERE mov_id IN (905, 907, 917)";
    $result = $conn->query($sql);
    ?><h3>eight</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['mov_title']; ?></td>
            </tr>
        </table>
        <?php
    }
}

//queryNine($conn);

function queryNine($conn) {
    $sql = "SELECT mov_title, mov_year FROM movie WHERE mov_title LIKE '%Boogie%Nights%'";
    $result = $conn->query($sql);
    ?><h3>Nine</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['mov_title, mov_year']; ?></td>
            </tr>
        </table>
        <?php
    }
}

//queryTen($conn);

function queryTen($conn) {
    $sql = "SELECT act_id FROM actor WHERE act_fname='Woody' AND act_lname='Allen'";
    $result = $conn->query($sql);
    ?><h3>Ten</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['act_id']; ?></td>
            </tr>
        </table>
        <?php
    }
}

//queryEleven($conn);

function queryEleven($conn) {
    $sql = "SELECT act_fname, act_lname, mov_title from actor NATURAL JOIN movie NATURAL JOIN movie_cast where mov_year < 1990 or mov_year > 2000";
    $result = $conn->query($sql);
    ?><h3>Eleven</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['act_fname']; ?></td>
            </tr>
        </table>
        <?php
    }
}

//queryTwelve($conn);

function queryTwelve($conn) {
    $sql = "SELECT act_fname, act_lname, mov_title, mov_year FROM actor JOIN movie_cast ON actor.act_id=movie_cast.act_id JOIN movie ON movie_cast.mov_id=movie.mov_id WHERE mov_year NOT BETWEEN 1990 and 2000";
    $result = $conn->query($sql);
    ?><h3>Twelve</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['act_fname']; ?></td>
                <td><?php echo $data['act_lname']; ?></td>
                <td><?php echo $data['mov_title']; ?></td>
                <td><?php echo $data['mov_year']; ?></td>
            </tr>
        </table>
        <?php
    }
}

//queryThirteen($conn);

function queryThirteen($conn) {
    $sql = "SELECT dir_fname, dir_lname, gen_title,
    COUNT(gen_title) 
    FROM director 
    NATURAL JOIN genres 
    NATURAL JOIN movie_genres 
    NATURAL JOIN movie_direction 
    GROUP BY dir_fname, dir_lname,gen_title 
    ORDER BY dir_fname,dir_lname";
    $result = $conn->query($sql);
    ?><h3>Thirteen</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['dir_fname']; ?></td>
                <td><?php echo $data['dir_lname']; ?></td>
                <td><?php echo $data['gen_title']; ?></td>
                <td><?php echo $data['COUNT(gen_title)']; ?></td>
            </tr>
        </table>
        <?php
    }
}

function queryTenN($conn) {
    $sql = "SELECT AVG(mov_time), gen_title, COUNT(gen_title)
    from movie
    inner join movie_genres on movie.mov_id = movie_genres.mov_id
    inner join genres on movie_genres.gen_id = genres.gen_id
    group by gen_title";
    $result = $conn->query($sql);
    ?><h3>TenN</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['AVG(mov_time)']; ?></td>
                <td><?php echo $data['gen_title']; ?></td>
                <td><?php echo $data['COUNT(gen_title)']; ?></td>
            </tr>
        </table>
        <?php
    }
}

function queryElevenN($conn) {
    $sql = "SELECT mov_title, mov_year, dir_fname, dir_lname, act_fname, act_lname, role
    from movie
    NATURAL JOIN movie_direction
    NATURAL JOIN movie_cast
    NATURAL JOIN director
    NATURAL JOIN actor
    WHERE mov_time=(SELECT MIN(mov_time) FROM movie)";
    $result = $conn->query($sql);
    ?><h3>ElevenN</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['mov_title']; ?></td>
                <td><?php echo $data['mov_year']; ?></td>
                <td><?php echo $data['dir_fname']; ?></td>
                <td><?php echo $data['dir_lname']; ?></td>
                <td><?php echo $data['act_fname']; ?></td>
                <td><?php echo $data['act_lname']; ?></td>
            </tr>
        </table>
        <?php
    }
}

function queryTwelveN($conn) {
    $sql = "SELECT DISTINCT mov_year, rev_stars 
    FROM movie 
    NATURAL JOIN rating 
    WHERE rev_stars IN (3,4)
    ORDER BY mov_year ASC";
    $result = $conn->query($sql);
    ?><h3>TwelveN</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['mov_year']; ?></td>
                <td><?php echo $data['rev_stars']; ?></td>
            </tr>
        </table>
        <?php
    }
}

function queryThirteenN($conn) {
    $sql = "SELECT rev_name, mov_title, rev_stars
    FROM reviewer
    INNER JOIN rating on rating.rev_id=reviewer.rev_id
    INNER JOIN movie on movie.mov_id=rating.mov_id WHERE reviewer.rev_name IS NOT NULL";
    $result = $conn->query($sql);
    ?><h3>ThirteenN</h3><?php
    while($data = $result->fetch_assoc()) {
            ?>
        <table>
            <tr>
                <td><?php echo $data['rev_name']; ?></td>
                <td><?php echo $data['mov_title']; ?></td>
                <td><?php echo $data['rev_stars']; ?></td>
            </tr>
        </table>
        <?php
    }
}








queryOne($conn);
queryTwo($conn);
queryThree($conn);
queryFour($conn);
queryFive($conn);
querySix($conn);
querySeven($conn);
queryEight($conn);
queryNine($conn);
queryTen($conn);
queryEleven($conn);
queryTwelve($conn);
queryThirteen($conn);

queryTenN($conn);
queryElevenN($conn);
queryTwelveN($conn);
queryThirteenN($conn);
queryFourteenN($conn);
queryFifteenN($conn);
querySixteenN($conn);





