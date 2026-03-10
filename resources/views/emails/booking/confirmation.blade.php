<x-mail::message>
# Rendez-vous confirmé

Bonjour {{ $booking->fullname }},

Votre demande de rendez-vous a bien été enregistrée.

**Détails :**
- **Date :** {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}
- **Créneau :** {{ $booking->time }}

Nous vous enverrons un lien de connexion ou un appel téléphonique à l'heure convenue.

<x-mail::button :url="route('home')">
Pascal Systems
</x-mail::button>

Cordialement,<br>
L'équipe Pascal Systems
</x-mail::message>
