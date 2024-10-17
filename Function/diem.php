<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bảng Điểm Của Em</title>
    <style>
      body {
        text-align: center;
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
      }
      .container {
        background-color: #d5d0d0;
        width: 100%;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
      }
      h2 {
        color: rgb(9, 9, 10);
        font-size: 30px;
        margin-bottom: 20px;
      }
      .form-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
      }
      label {
        width: 30%;
        text-align: left;
        font-size: 18px;
      }
      .input-field {
        width: 65%;
        height: 40px;
        font-size: 18px;
        box-sizing: border-box;
      }
      input[type="number"],
      select {
        height: 40px;
      }
      select {
        color: red;
      }
      input[readonly] {
        background-color: #f0f0f0;
      }
      .result {
        color: red;
        font-size: 25px;
        font-weight: bold;
      }
      .buttons {
        text-align: center;
      }
      button {
        width: 120px;
        height: 40px;
        margin: 5px;
        font-size: 18px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2 id="bangdiem">BẢNG ĐIỂM CỦA EM</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="semester1">Semester 1:</label>
          <input type="number" id="semester1" name="semester1" class="input-field" value="<?php echo isset($_POST['semester1']) ? $_POST['semester1'] : ''; ?>" required />
        </div>

        <div class="form-group">
          <label for="semester2">Semester 2:</label>
          <input type="number" id="semester2" name="semester2" class="input-field" value="<?php echo isset($_POST['semester2']) ? $_POST['semester2'] : ''; ?>" required />
        </div>

        <div class="form-group">
          <label for="year">Year:</label>
          <select id="year" name="year" class="input-field">
            <option value="1" <?php if (isset($_POST['year']) && $_POST['year'] == '1') echo 'selected'; ?>>1</option>
            <option value="2" <?php if (isset($_POST['year']) && $_POST['year'] == '2') echo 'selected'; ?>>2</option>
            <option value="3" <?php if (isset($_POST['year']) && $_POST['year'] == '3') echo 'selected'; ?>>3</option>
          </select>
        </div>

        <div class="form-group">
          <label for="summarise">Summarise:</label>
          <input type="text" id="summarise" name="summarise" class="input-field" value="<?php echo isset($summarise) ? $summarise : ''; ?>" readonly />
        </div>

        <div class="buttons">
          <button type="submit">OK</button>
          <button type="reset">Cancel</button>
        </div>
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $semester1 = $_POST["semester1"];
          $semester2 = $_POST["semester2"];
          $year = $_POST["year"];

          if (is_numeric($semester1) && is_numeric($semester2)) {
              $summarise = ($semester1 + $semester2) / 2;

              echo "<script>document.getElementById('summarise').value = '$summarise';</script>";

             
              if ($summarise >= 9) {
                  echo "<div class='result' style='color: red;'>Học sinh giỏi</div>";
              } elseif ($summarise >= 7 && $summarise < 9) {
                  echo "<div class='result' style='color: blue;'>Học sinh khá</div>";
              } elseif ($summarise >= 5 && $summarise < 7) {
                  echo "<div class='result' style='color: yellow;'>Học sinh Trung bình</div>";
              } else {
                  echo "<div class='result' style='color: gray;'>Học sinh yếu</div>";
              }
          }
      }
      ?>
    </div>
  </body>
</html>
