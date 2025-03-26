import { FormEvent, useReducer } from 'react';
import { useRouter } from 'next/navigation';

export interface FormState {
  username: string;
  password: string;
  showPassword: boolean;
  error: string;
  isLoading: boolean;
}

type Action =
  | { type: 'SET_FIELD'; field: keyof FormState; value: string | boolean }
  | { type: 'SET_ERROR'; error: string }
  | { type: 'SET_LOADING'; isLoading: boolean }
  | { type: 'TOGGLE_PASSWORD' };

const initialState: FormState = {
  username: '',
  password: '',
  showPassword: false,
  error: '',
  isLoading: false,
};

export const reducer = (state: FormState, action: Action): FormState => {
  switch (action.type) {
    case 'SET_FIELD':
      return { ...state, [action.field]: action.value };
    case 'SET_ERROR':
      return { ...state, error: action.error };
    case 'SET_LOADING':
      return { ...state, isLoading: action.isLoading };
    case 'TOGGLE_PASSWORD':
      return { ...state, showPassword: !state.showPassword };
    default:
      return state;
  }
};

export const handleLogin = async (
  e: FormEvent<HTMLFormElement>,
  state: FormState,
  dispatch: React.Dispatch<Action>,
  router: ReturnType<typeof useRouter>
) => {
  e.preventDefault();
  dispatch({ type: 'SET_ERROR', error: '' });
  dispatch({ type: 'SET_LOADING', isLoading: true });

  try {
    const response = await fetch('http://localhost:8000/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        username: state.username,
        password: state.password,
      }),
    });

    const data = await response.json();

    if (!response.ok) {
      throw new Error(data.error || 'Login failed');
    }

    // Save token to localStorage or context
    localStorage.setItem('token', data.token);

    // Redirect to homepage or dashboard
    router.push('/homepage');
  } catch (error: any) {
    dispatch({ type: 'SET_ERROR', error: error.message });
  } finally {
    dispatch({ type: 'SET_LOADING', isLoading: false });
  }
};
