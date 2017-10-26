@if($reservation->state_reservation == 'cancelado')
    <div class="icon-big icon-danger text-center">
        @elseif($reservation->state_reservation == 'en espera')
            <div class="icon-big icon-warning text-center">
                @elseif($reservation->state_reservation == 'completado')
                    <div class="icon-big icon-success text-center">
                        @else
                            <div class="icon-big icon-info text-center">
@endif
