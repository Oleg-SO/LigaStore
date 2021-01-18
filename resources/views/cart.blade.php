@extends('main')
<title>Корзина</title>
<meta name="description" content="Корзина">

@section('content')

<div class="container">

  <ul class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="cart.html">Корзина</a></li>
    <form class="form-wrapper cf" action="{{ route('search') }}" method="GET">
      <input type="text" placeholder="Поиск товара" name="query" id="query" value="{{ request()->input('query') }}" required>
      <button>Поиск</button>
    </form>
  </ul>
  @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
    <div class="column-block">
        <div class="columnblock-title">Категории</div>
        <div class="category_block">
          <ul class="box-category treeview-list treeview">
              @foreach($categories as $_category)
            <li><a href="{{ route('shop.index', ['category' => $_category->slug]) }}" class="f-parent">{{ $_category->name }}</a>
              <ul>
                @foreach($category as $categor)
                  @if ($categor->parent_id == $_category->id)
                    <li><a href="{{ route('shop.index', ['category' => $categor->slug]) }}">{{ $categor->name }}</a></li>
                  @endif
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-9" id="content">
    @if (Cart::count() > 0)
    <h2>{{ Cart::count() }} товар(ов) в корзине</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-center">Фото</td>
                        <td class="text-left">Название продукта</td>
                        <td class="text-left">Количество</td>
                        <td class="text-right">Цена за ед.</td>
                    </tr>
                </thead>
                <tbody>
            @foreach (Cart::content() as $item)
              <tr>
                <td class="text-center"><a href="{{ route('shop.show', $item->model->slug) }}"><img class="img-thumbnail" title="{{ $item->model->name }}" alt="{{ $item->model->name }}" src="{{ productImage($item->model->image) }}"></a></td>
                <td class="text-left"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></td>

                <td class="text-left"><div style="max-width: 200px;" class="input-group btn-block">
                  <span class="input-group-btn">
                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                      <input type="text" class="quantity" size="1" value="{{ $item->qty }}" name="quantity">

                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <button class="btn btn-primary" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                    </form>
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button  class="btn btn-danger" title="" data-toggle="tooltip" type="submit" data-original-title="Удалить"><i class="fa fa-times-circle"></i></button>
                    </form>
                    </span></div></td>
                <td class="text-right">{{ $item->model->presentPrice() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="pull-left"> Доставка свыше 40000 тг бесплатна.</div>
        <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
            <tbody>

              <tr>
                <td class="text-right"><strong>Сумма:</strong></td>
                <td class="text-right">{{ presentPrice(Cart::subtotal()) }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
        <div class="buttons">
        <div class="pull-left"><a class="btn btn-default" href="{{ route('shop.index') }}">Продолжить покупки</a></div>
        <div class="pull-right"><a class="btn btn-primary" href="{{ route('checkout.index') }}">Оформить заказ</a></div>
      </div>
        @else

        <h3>Корзина пуста</h3>
            <div class="buttons">
            <div class="pull-left"><a class="btn btn-default" href="{{ route('shop.index') }}">Продолжить покупки</a></div>
        </div>
        @endif


    </div>
    @include('partials.might-like')



  </div>
</div>


@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>


@endsection
