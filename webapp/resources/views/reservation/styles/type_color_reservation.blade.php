@if($reservation->state_reservation == 'cancelado')
    <div class="alert alert-danger">
        @elseif($reservation->state_reservation == 'en espera')
            <div class="alert alert-warning">
                @elseif($reservation->state_reservation == 'completado')
                    <div class="alert alert-success">
                        @else
                            <div class="alert alert-info">
@endif
