{{-- resources/views/parent/notifications.blade.php --}}
@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-6">
  <h1 class="text-2xl font-bold text-center text-blue-600 mb-4">🔔 Mes notifications</h1>

  @forelse($notifications as $note)
    @php $data = $note->data; @endphp
    <div class="border-b py-3 flex justify-between items-center">
      <div>
        <span class="mr-2">{{ $data['icon'] ?? 'ℹ️' }}</span>
        {{ $data['message'] }}
      </div>
      <div class="text-xs text-gray-400">{{ $note->created_at->format('d/m/Y H:i') }}</div>
    </div>
  @empty
    <p class="text-center text-gray-500 italic">Aucune notification pour le moment.</p>
  @endforelse
</div>
@endsection
