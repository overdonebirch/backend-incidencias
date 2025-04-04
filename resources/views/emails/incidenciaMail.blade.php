<style>
    .cuerpo-mensaje {
        display: flex;
        flex-direction: column;
    }

    .detalles {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .titulo-estandar {
        color: #7db5ed;
        font-weight: bold;
        text-align: center;
    }
    .titulo-eliminado{
        color: red;
        font-weight: bold;
        text-align: center;
    }

</style>

<div class="cuerpo-mensaje">
    <h1 class="{{$colorTitulo}}">{{ $cuerpoMensaje->titulo }}</h1>
    <div class="detalles">
        @foreach ($cuerpoMensaje->detalles as $detalle)
            <p>{{ $detalle }}</p>
        @endforeach
    </div>
</div>