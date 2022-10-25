@extends('layouts/main')
@section('title','Contact')
@section('content')
     
   
    <section id="contact" class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Contact Me</h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @endsection
        <style>
        #contact{
            padding-top: 100px
        }
        </style>
    
</body>
</html>