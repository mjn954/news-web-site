@include("layout.navigation")
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ارتباط با ما</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e1e1e, #3a3a3a);
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            animation: fadeIn 1.5s ease-in-out;
        }
        .container {
            max-width: 600px;
            padding: 30px;
            background: rgba(30, 30, 30, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s;
            animation: slideUp 1.5s ease-in-out;
        }
        .container:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.6);
        }
        .form-control {
            background-color: rgba(51, 51, 51, 0.8);
            color: white;
            border: 1px solid #666666;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: rgba(70, 70, 70, 0.9);
            border-color: #ffd700;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.7);
            transform: scale(1.02);
        }
        .btn-gold {
            background: linear-gradient(135deg, #ffd700, #ffae00);
            color: white;
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 1.1rem;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.6);
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #ffae00, #e69500);
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.8);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }
        .header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #ffd700;
            text-shadow: 2px 2px 10px rgba(255, 215, 0, 0.7);
        }
        .header p {
            font-size: 1.2rem;
            color: #b5b5b5;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>ارتباط با ما</h1>
            <p>نظرات، پیشنهادات و سوالات خود را با ما در میان بگذارید</p>
        </div>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">عنوان</label>
                <input type="text" class="form-control" id="title" placeholder="عنوان را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">متن پیام</label>
                <textarea class="form-control" id="body" rows="4" placeholder="پیام خود را بنویسید"></textarea>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">نام</label>
                <input type="text" class="form-control" id="name" placeholder="نام شما">
            </div>
            <button type="submit" class="btn btn-gold w-100">📩 ارسال پیام</button>
        </form>
    </div>
</body>
</html>
@include("layout.footer")
