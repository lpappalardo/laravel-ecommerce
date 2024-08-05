<x-layout-main>
    <x-slot:title>Página Principal</x-slot:title>

    <section class="banner contenido-inicio">
        <div class="banner-texto">
            <p>"Las historias son formas de difundir el conocimiento de culturas, pueblos, pensamientos y sueños."</p>
        </div>
    </section>

    <section class="container contenido-inicio">
        <div class="caracteristicas">
            <div class="caracteristica">
                <div class="caracteristica-img">
                    <img src="{{ url('img/icons/rocket.png') }}" alt="Cohete">
                </div>
                <div class="caracteristica-texto">
                    <p>Entregas 24hrs</p>
                </div>
            </div>
            <div class="caracteristica">
                <div class="caracteristica-img">
                    <img src="{{ url('img/icons/delivery.png') }}" alt="Entrega">
                </div>
                <div class="caracteristica-texto">
                    <p>Entregas a todo el país</p>
                </div>
            </div>
            <div class="caracteristica">
                <div class="caracteristica-img">
                    <img src="{{ url('img/icons/money.png') }}" alt="Billetes">
                </div>
                <div class="caracteristica-texto">
                    <p>14 dias de reembolso</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container contenido-inicio">
        <div class="articulos">
            <div class="articulo">
                <picture class="articulo-img">
                    <img src="{{ url('img/inicio/nosotros.png') }}" alt="Nosotros">
                </picture>
                <div class="articulo-texto invertido">
                    <h2>Sobre Nosotros</h2>
                    <p>Somos un grupo con gran pasión por el consumo de contenidos literarios, lo cuales tienen el deseo de difundir el disfrute del medio que nos apasiona a más individuos. Sin embargo, somos conscientes que en muchas ocasiones es complicado poder acceder a ciertos títulos y autores. Esto se debe a que en la mayoría de los casos, la difusión y distribución de los mismos dependen del accionar de las editoriales que posean los derechos de los respectivos títulos y autores en cada país, las cuales no van a invertir mucho esfuerzo en dichas acciones si desde un inicio no ven un apoyo notable del posible público consumidor. Esto ocasiona que muchas obras literarias pasen desapercibidas y con el tiempo se vuelvan de difícil acceso. </p>
                </div>
            </div>
            <div class="articulo">
                <picture class="articulo-img">
                    <img src="{{ url('img/inicio/propuesta.png') }}" alt="Propuesta">
                </picture>
                <div class="articulo-texto">
                    <h2>Nuestra Propuesta</h2>
                    <p>Lo que ofrecemos es una página mediante la cual, poder realizar búsquedas y compras de las obras literarias de tu interés. A su vez, brindamos la posibilidad de poder encontrar en nuestro servicio recomendaciones de títulos que puedan llamarte la atención en función de tus respectivas búsquedas, descubrir constantes ofertas de títulos literarios de diversos temas y tener la posibilidad de utilizar herramientas como filtros de búsqueda para facilitar navegación y el uso del servicio.</p>
                </div>
            </div>
        </div>
    </section>
</x-layout-main>
