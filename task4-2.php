  <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ?? null;
        $number = $_POST['number'] ?? null;


        $_SESSION["name"] = $name;
        $_SESSION["number"] = $number;
    }
    ?>

  <html>

  <body>
      <table class="table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Phone no</th>
                  <th>Date</th>
              </tr>
          </thead>

          <tbody>
              <tr>
                  <td><?= $name ?></td>
                  <td> <?= $number ?></td>
                  <td> <?= date('Y-m-d') ?></td>
              </tr>


          </tbody>
      </table>


  </body>

  </html>