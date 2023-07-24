
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<main style="margin-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ !empty ($user) ? route ('user_update', $user) : url('user/create') }}" 
                method="POST" enctype="">
                @if(!empty ($user))
                    @method('PATCH')
                @endif   
                @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-5">
                            <input value="{{ old('name', @$user->name ) }}" type="text" class="form-control" name="name" id="name" placeholder="Nama User">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input value="{{ old('email', @$user->email ) }}" type="text" class="form-control" name="email" id="email" placeholder="email">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input value="{{ old('password', @$user->password ) }}" type="text" class="form-control" name="password" id="password" placeholder="password">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-5">
                            <input value="{{ old('role_id', @$user->role_id ) }}" type="text" class="form-control" name="role_id" id="role_id" placeholder="role">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('role_id') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('user') }}" class="btn btn-primary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>