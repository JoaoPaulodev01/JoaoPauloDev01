// src/Counter.test.js
import React from 'react';
import { render, screen, fireEvent } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import Counter from './Counter';

test('renders counter component and displays initial count', () => {
  render(<Counter />);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toBeInTheDocument();
  expect(countElement).toHaveTextContent('Count: 0');
});

test('increments the counter when Increment button is clicked', () => {
  render(<Counter />);
  const incrementButton = screen.getByText(/Increment/i);
  fireEvent.click(incrementButton);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toHaveTextContent('Count: 1');
});

test('decrements the counter when Decrement button is clicked', () => {
  render(<Counter />);
  const decrementButton = screen.getByText(/Decrement/i);
  fireEvent.click(decrementButton);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toHaveTextContent('Count: -1');
});
