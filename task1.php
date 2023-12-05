<html>
<form>
    <table id="table-data">
        <tr>
            <td></td>
        </tr>
        <td>
        <button id="live-time" style="text-align: center;padding: 10px;margin-left: 300PX;">Click on it for the exact timing</button>
        </td>
    </table>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#live-time").click(function() {
            $.ajax({
                url: "task2.php",
                type: "POST",
                // data: {
                //     name: 'Test',
                //     email: 'test@gmail.com'
                // },
                success: function(result) {
                    alert('The current date and time  is: ' + result);
                   
                }

            });
        });
    });
</script>
</html>





<!-- function getTime(){
    ajax({
        type  : 'post',
        action : 'filename.php',
        data : {
            name : 'Test',
            email : 'test@gmail.com'
        },
        success : function(result) {
            console.log(result);
        }
    })
} -->