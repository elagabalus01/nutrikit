<h1>Hola {{  Auth::user()->name }}</h1>
<p>Estos son los animales registrados</p>
<h2> Lista de animales </h2>
<p>
    
    @foreach(App\Animal::All() as $animal)
    <p>{{ $animal->nombre }} </p>
    @endforeach
</p>