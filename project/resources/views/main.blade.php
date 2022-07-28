<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

<body > <!--class="animsition" -->

<!-- Header -->
@include('header')

<!-- Cart -->
@include('cart')

@yield('content')
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © Kho hàng ABC
    <a class="text-dark" href=""></a>
  </div>
  <!-- Copyright -->
</footer>

@include('footer')

</body>
</html>
