﻿using MediatR;

namespace Fixit.Shared.CQRS
{
    public interface ICommandHandler<in TRequest> : IRequestHandler<TRequest, Unit>
        where TRequest : ICommand
    {

    }

    public interface ICommandHandler<in TRequest, TResponse> : IRequestHandler<TRequest, TResponse>
        where TRequest : ICommand<TResponse>
    {

    }
}