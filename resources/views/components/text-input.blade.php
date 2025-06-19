@props(['disabled' => false])

<input @disabled($disabled) {!! $attributes->merge(['class' => 'bg-dark-primary border-dark-tertiary text-text-light focus:border-accent-blue focus:ring-accent-blue rounded-md shadow-sm']) !!}>