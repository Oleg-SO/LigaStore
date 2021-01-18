<ul class="nav-right">
    @guest
    <li><a href="{{ route('register') }}">Регистрация</a></li>
    <li class="login-icon">
        <a href="{{ route('login') }}"><i class="fa fa-user"></i>Войти</a>
    </li>
    @else
    <li>
        <a href="{{ route('users.edit') }}">Личный Кабинет</a>
    </li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Выйти
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest
    <li class="cart-icon">
        <a href="{{ route('cart.index') }}">
        Корзина<i class="icon_bag_alt"></i>
            @if (Cart::instance('default')->count() > 0)
            <span>{{ Cart::instance('default')->count() }}</span>
            @endif
        </a>
        <div class="cart-hover">
            @if (Cart::count() > 0)
            <div class="select-items">
                <table>
                    <tbody>
                        @foreach(Cart::content() as $item)
                        <tr>
                            <td class="si-pic"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" ></a></td>
                            <td class="si-text">
                                <div class="product-selected">
                                    <!-- <p>$60.00 x 1</p> -->
                                    <h6><a href="{{ route('shop.show', $item->model->slug) }}" class="item-names">{{ $item->model->name }}</a></h6>
                                </div>
                            </td>
                            <td class="si-close">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn">X</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="select-button">
                <a href="./cart" class="primary-btn view-card">Перейти в корзину</a>
            </div>
            @endif
            
            @if (Cart::count() == 0)
            <h3>Корзина пуста</h3>
            @endif
        </div>
    </li>
</ul>
