@extends('main')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<d6f7a1cc-7418-4004-a662-9101e143f3df>" type="text/javascript"></script>
<script src="hotspot_layer.js" type="text/javascript"></script>
@section('title', 'Достака и Оплата')
@section('content')
<div class="container-breadcumb">
	<div class="breadcrumb">
		<a href="/">
			<span class="breadcrumb__inner">
				<span class="breadcrumb__title">Главная</span>
			</span>
		</a>
		<a>
			<span class="breadcrumb__inner">
				<span class="breadcrumb__title">Доставки и Оплата</span>
			</span>
		</a>
	</div>
</div>

<div class="container" style="padding: 0 30px;">
  <div class="row">
  <div class="delivery">
      <h2>Условия доставки и оплаты в Алматы</h2>

      <br>

      <h3>Оплата физическим лицам</h3>

      <ul>
        <li><strong>Наличными курьеру</strong><br>(Курьер вместе с товаром отдает заранее подготовленные документы но при заказе не более 500 000 тг., при сумме выше оплата производится в офисе или через банковский перевод)</li>
        <li><strong>Visa/MasterCard</strong><br>(при доставке заказ должен получать тот человек на которого оформлена карта обязательно иметь при себе уд. личности или паспорт)</li>
        <li><strong>Банковский перевод</strong><br></li>
      </ul>

      <h3>Оплата юридическим лицам</h3>

      <p>(при оформлении заказа необходимо выслать реквизиты: название, БИН/ИИН, юр. адрес, банковские реквизиты)</p>

      <ul>
        <li><strong>Наличными курьеру</strong><br>(Курьер вместе с товаром отдает заранее подготовленные документы: счет-фактуру, чек, накладную, акт выполненых работ)</li>
        <li><strong>Банковским переводом</strong><br>(После оплаты счета, Вы высылаете нам скан доверенности, курьер вместе с товаром привозит закрывающие документы: счет-фактуру, накладную, акт выполненых работ)</li>
      </ul>
      <h3>Самовывоз в Алматы</h3>
      <p>Самовывоз из пункта выдачи возможен только в случаях:</p>

      <ul>
        <li><p>Статус товар в наличии, и указана ближайшая дата самовывоза</p></li>
        <li><p>Осуществлена предоплата за товар (для физических лиц через Visa/MasterCard, для юридических лиц через банковский перевод)</p></li>
      </ul>

      <h3 style="text-align: center; padding-top: 20px; padding-bottom: 20px;">Карта зоны доставки</h3>

      <table>
        <thead>
          <tr>
            <td></td>
            <td><p>Сумма заказов:</p></td>
            <td><p>Больше 40 000 тг.</p></td>
            <td><p>Меньше 40 000 тг.</p></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="background-color: #b6ebaf; width: 40px;"></td>
            <td><p><strong>Зона 1</strong> (Северное кольцо, Бекмаханова, Рыскулова)</p></td>
            <td><p>Беслатно</p></td>
            <td><p>1000 тг.</p></td>
          </tr>
          <tr>
            <td style="background-color: #fee274; width: 40px;"></td>
            <td><p><strong>Зона 2</strong> (Рыскулова, ВОАД, Достык, Аль-фараби, Сайна)</p></td>
            <td><p>Беслатно</p></td>
            <td><p>1500 тг.</p></td>
          </tr>
          <tr>
            <td style="background-color: #cdeaff; width: 40px;"></td>
            <td><p><strong>Зона 3</strong> (Бурундайская, Вдоль БАК, Байкена Ашимова, мкр. Жулдыз, Кокжиек, Калкаман, Кок-Тобе)</p></td>
            <td><p>1000 тг.</p></td>
            <td><p>2000 тг.</p></td>
          </tr>
        </tbody>
      </table>
      <div class="map"><iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aca545da1347b459c83c888124e447c4765e490482485bbb882c56bdb017fd7d5&amp;source=constructor" width="900" height="500" frameborder="0"></iframe>></div>

  </div>
</div>
</div>
@endsection
