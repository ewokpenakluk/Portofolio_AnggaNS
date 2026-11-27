@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block; text-decoration: none;">
<span style="font-size: 17px; font-weight: 700; letter-spacing: -0.01em; color: #1e293b;">
    {{ config('mail.owner.name') }}
</span>
</a>
</td>
</tr>
