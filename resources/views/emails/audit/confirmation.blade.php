<x-mail::message>
# Merci pour votre intérêt.

Bonjour {{ $audit->name }},

Nous avons bien reçu votre demande d'audit concernant le thème : **{{ $audit->challenge }}**.

Notre équipe analyse votre demande et reviendra vers vous à l'adresse **{{ $audit->email }}** dans les plus brefs délais.

<x-mail::button :url="route('home')">
Visiter notre site
</x-mail::button>

Merci de nous faire confiance,<br>
**Pascal Systems**
</x-mail::message>
