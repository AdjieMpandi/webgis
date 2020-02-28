<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <label for="Speech Recognition">Speech Recognition</label>
    <input type="text" id="speechToText" placeholder="speak something" onclick=record()>

    <script>
        function record() {
            var recognition = new webkitSpeechRecognition();
            recognition.lang = "id";

            recognition.onresult = function(event) {
                console.log(event);
                document.getElementById('speechToText').value = event.results[0][0].transcript;
            }

            recognition.start();
        }
    </script>

    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/LnSrH27c8DA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</body>
</html>