<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- FontAwesome for icons -->
    <style>
        body {
            background-color: #f5f5dc;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .profile-avatar img {
            width: 100%;
            max-width: 120px; 
            max-height: 120px;
            margin-bottom: 15px;
        }

        .form-group {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: auto;
        }

        .alert {
            text-align: center;
        }

        .back-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }
    </style>
</head>

<body>

    <!-- Back to Home Button with Left Arrow Icon -->
    <div class="back-btn">
        <a href="{{ url('/') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>

    <div class="container">
        <div class="text-center">
            <h2>Your Profile</h2>

            <div class="profile-avatar">
                <img src="{{ Auth::user()->avatar ?? asset('images/Avatar.jpg') }}" 
                     alt="User Avatar" class="rounded-circle">
                <p class="mt-2 font-weight-bold">User Avatar</p>
            </div>

            <form action="{{ route('profile.update-avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="avatar">Upload Avatar:</label>
                    <input type="file" name="avatar" id="avatar" class="form-control mx-auto" required style="width: auto;">
                </div>
                <button type="submit" class="btn btn-primary">Update Avatar</button>
            </form>

            <form action="{{ route('profile.update-name') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" id="firstName" class="form-control mx-auto" value="{{ Auth::user()->firstName }}" required style="width: auto;">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" id="lastName" class="form-control mx-auto" value="{{ Auth::user()->lastName }}" required style="width: auto;">
                </div>
                <button type="submit" class="btn btn-primary">Update Name</button>
            </form>

            <form action="{{ route('profile.delete-account') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown(); 
        });
    </script>
</body>
</html>
