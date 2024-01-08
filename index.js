// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Word Highlighter</title>
//     <style>
//         .highlight {
//             background-color: yellow;
//         }
//     </style>
// </head>
// <body>
<script>

    <p id="paragraph">
        This is a sample paragraph. Click on any word to highlight it in yellow.
    </p>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Get the paragraph element
            var paragraph = $("#paragraph");

            // Split the paragraph into words
            var words = paragraph.text().split(' ');

            // Clear the original content of the paragraph
            paragraph.empty();

            // Iterate through each word and wrap it in a span
            for (var i = 0; i < words.length; i++) {
                var span = $('<span>' + words[i] + ' </span>');
                paragraph.append(span);
            }

            // Add click event to each word
            paragraph.on('click', 'span', function() {
                // Remove previous highlights
                paragraph.find('.highlight').removeClass('highlight');
                
                // Add highlight to the clicked word
                $(this).addClass('highlight');
            });
        });
    </script>
</body>
</html>
