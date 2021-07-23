<div class="card">
    <div class="card-header pb-0">
        <h6>{{ __('Browser Sessions') }}</h6>
    </div>

    <div class="table-responsive">
        <table class="table table-vcenter table-bordered">
            <thead>
                <tr>
                    <th style="border-left: 0;">User Agent</th>
                    <th>IP Address</th>
                    <th>Last Activity</th>
                    <th class="w-1" style="border-right: 0;"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($devices as $device)
                <tr>
                    <td class="small">
                        {{ $device->user_agent }}
                    </td>
                    <td>
                        {{ $device->ip_address }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::createFromTimestamp($device->last_activity)->locale(str_replace('_', '-', app()->getLocale()))->diffForHumans() }}
                    </td>
                    <td>
                        @if (session()->getId() == $device->id)
                            <button disabled="disabled" class="btn btn-primary">
                                {{ __('Current Device') }}
                            </button>
                        @else
                            <form action="{{ route('profile.device.delete', ['id' => $device->id]) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Remove" />
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<hr class="my-5 bg-gray-500">
