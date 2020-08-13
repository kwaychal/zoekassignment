<!DOCTYPE html>
<html>

<body>
    @php
    for ($i = 1; $i <= 100; $i++) {
        $checkThreeFlag = (0 == $i % 3) ? 1 : 0;
        $checkFiveFlag = (0 == $i % 5) ? 1 : 0;

        if ($checkThreeFlag && $checkFiveFlag) {
            echo "FizzBuzz <br>";
        } elseif ($checkThreeFlag) {
            echo "Fizz <br>";
        } elseif ($checkFiveFlag) {
            echo "Buzz <br>";
        } else {
            echo $i . "<br>";
        }
    }
    @endphp
</body>

</html>