<p class="font-weight-bold" style="margin-top:8px;font-size: 16px; margin-bottom:-2px">Подписка на новости</p>

<form action="{{ route('mailings.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email" style="font-size:10px">
            Электронная почта
        </label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="mail@gmail.com" >

        <input type="submit" class="btn btn-outline-danger" value="Подписаться" style="margin-top: 10px">
    </div>
</form>
